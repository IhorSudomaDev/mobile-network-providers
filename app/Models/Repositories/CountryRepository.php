<?php

namespace App\Models\Repositories;

use App\Exceptions\Country\CountryNotFoundException;
use App\Models\Country;

/**
 * Class CountryRepository
 * @package App\Models\Repositories
 */
class CountryRepository
{

	/**
	 * @param int $id
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findById(int $id): Country
	{
		$country = Country::where('id', '=', $id)->first();
		if ($country === NULL) {
			throw new CountryNotFoundException();
		}
		return $country;
	}

	/**
	 * @param string $mcc
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByMcc(string $mcc): Country
	{
		$country = Country::where('mcc', '=', $mcc)->first();
		if ($country === NULL) {
			throw new CountryNotFoundException();
		}
		return $country;
	}

	/**
	 * @param string $code
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByCode(string $code): Country
	{
		$country = Country::where('country_code', '=', $code)->first();
		if ($country === NULL) {
			throw new CountryNotFoundException();
		}
		return $country;
	}

	/**
	 * @param string $additionalCode
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByAdditionalCode(string $additionalCode): Country
	{
		$country = Country::where('additional_country_code', '=', $additionalCode)->first();
		if ($country === NULL) {
			throw new CountryNotFoundException();
		}
		return $country;
	}
}