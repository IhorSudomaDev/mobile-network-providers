<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Class TestCommand
 * @package App\Console\Commands
 */
class TestCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'mnp:test';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Test command';

	/**
	 * Execute the console command.
	 * @return void
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 */
	public function handle(): void
	{
		$inputFileName = storage_path('codes.xlsx');
		/**  Create a new Reader of the type that has been identified  **/
		$reader = IOFactory::createReader("Xlsx");
		/**  Load $inputFileName to a Spreadsheet Object  **/
		$spreadsheet = $reader->load($inputFileName);
		/**  Convert Spreadsheet Object to an Array for ease of use  **/
		$countries = $spreadsheet->getActiveSheet()->toArray();
		/**  Delete headers from array  **/
		/**  Create records  **/
		foreach ($countries as $countryData) {
			$country = new Country();
			$country->setTitle($countryData[1]);
			$country->setMcc($countryData[0]);
			$country->setCountryCode($countryData[2]);
			$country->save();
		}
	}
}
