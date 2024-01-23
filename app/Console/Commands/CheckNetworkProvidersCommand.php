<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

/**
 * Class CheckNetworkProvidersCommand
 * @package App\Console\Commands
 */
class CheckNetworkProvidersCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'mnp:check';

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
		$inputFileName = storage_path($code . '.xlsx');
		/**  Create a new Reader of the type that has been identified  **/
		$reader = IOFactory::createReader("Xlsx");
		/**  Load $inputFileName to a Spreadsheet Object  **/
		$spreadsheet = $reader->load($inputFileName);
		/**  Convert Spreadsheet Object to an Array for ease of use  **/
		$providers = $spreadsheet->getActiveSheet()->toArray();
		/**  Delete headers from array  **/
		unset($providers[0]);
		print_r($providers);
	}
}
