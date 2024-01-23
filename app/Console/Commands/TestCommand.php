<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
	 */
	public function handle(): void
	{
	}
}
