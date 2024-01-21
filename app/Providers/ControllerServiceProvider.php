<?php

namespace App\Providers;

use App\Models\Controllers\CountryController;
use App\Models\Controllers\NetworkProviderController;
use Illuminate\Support\ServiceProvider;

/**
 * Class ControllerServiceProvider
 * @package App\Providers
 */
class ControllerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 * @return void
	 */
	public function boot(): void
	{
		$this->app->singleton(CountryController::class);
		$this->app->alias(CountryController::class, 'CountryController');
		$this->app->singleton(NetworkProviderController::class);
		$this->app->alias(NetworkProviderController::class, 'NetworkProviderController');
	}
}
