<?php

namespace App\Console\Commands;

use App\Models\NetworkProvider;
use App\ValueObjects\NetworkProviderStatus;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

/**
 * Class CreateNetworkProvidersCommand
 * @package App\Console\Commands
 */
class CreateNetworkProvidersCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'mnp:create';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Create new records';

	/**
	 * Execute the console command.
	 * @return void
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 * @throws Exception
	 */
	public function handle(): void
	{
		$code          = $this->ask('Country code');
		$id            = $this->ask('Country ID');
		$inputFileName = storage_path($code . '.xlsx');
		/**  Create a new Reader of the type that has been identified  **/
		$reader = IOFactory::createReader("Xlsx");
		/**  Load $inputFileName to a Spreadsheet Object  **/
		$spreadsheet = $reader->load($inputFileName);
		/**  Convert Spreadsheet Object to an Array for ease of use  **/
		$providers = $spreadsheet->getActiveSheet()->toArray();
		/**  Delete headers from array  **/
		unset($providers[0]);
		/**  Create records  **/
		foreach ($providers as $provider) {
			$networkProvider = new NetworkProvider();
			$networkProvider->setCountryId($id);
			$networkProvider->setMnc($provider[1]);
			$networkProvider->setTitle($provider[2] === NULL ? '' : $provider[2]);
			$networkProvider->setOperator($provider[3] === NULL ? '' : $provider[3]);
			$networkProvider->setStatus(NetworkProviderStatus::getStatusIdFor($provider[4]));
			$networkProvider->save();
		}
	}
}
