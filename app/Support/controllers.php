<?php

use App\Models\Controllers\CountryController;
use App\Models\Controllers\NetworkProviderController;

if ( ! function_exists('countryController')) {
	/*** @return CountryController */
	function countryController(): CountryController
	{
		return app('CountryController');
	}
}
if ( ! function_exists('networkProviderController')) {
	/*** @return NetworkProviderController */
	function networkProviderController(): NetworkProviderController
	{
		return app('NetworkProviderController');
	}
}