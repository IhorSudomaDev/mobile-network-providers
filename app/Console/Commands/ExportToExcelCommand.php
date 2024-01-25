<?php

namespace App\Console\Commands;

use App\Export\ExportController;
use Excel;
use Illuminate\Console\Command;
use Throwable;

/**
 * Class ExportToExcelCommand
 * @package App\Console\Commands
 */
class ExportToExcelCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'mnp:create-excel';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Create xlsx file';

	/**
	 * Execute the console command.
	 * @return void
	 */
	public function handle(): void
	{
		try {
			Excel::store(new ExportController(), sprintf('%s%s.xlsx', 'Local_Network_Providers_2024_01_25', now('UTC')->format('_H_i')));
		} catch (Throwable $e) {
		}
	}
}
