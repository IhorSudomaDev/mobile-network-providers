<?php

use App\Exceptions\Country\CountryNotFoundException;
use App\Mediators\Wiki;

if ( ! function_exists('getCountryNameByCode')) {
	/**
	 * @param string $countryCode
	 * @return string
	 * @throws CountryNotFoundException
	 */
	function getCountryNameByCode(string $countryCode): string
	{
		return countryController()->findByCode($countryCode)->getTitle();
	}
}
if ( ! function_exists('wiki')) {
	function wiki(): Wiki
	{
		return new Wiki();
	}
}