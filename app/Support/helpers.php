<?php

use App\Exceptions\Country\CountryNotFoundException;

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