<?php

namespace App\Models\Repositories;

use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\Models\NetworkProvider;

/**
 * Class NetworkProviderRepository
 * @package App\Models\Repositories
 */
class NetworkProviderRepository
{
	/**
	 * @param int $id
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 */
	public function findById(int $id): NetworkProvider
	{
		$country = NetworkProvider::where('id', '=', $id)->first();
		if ($country === NULL) {
			throw new NetworkProviderNotFoundException();
		}
		return $country;
	}

	/**
	 * @param int $countryId
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 */
	public function findByCountryId(int $countryId): NetworkProvider
	{
		$country = NetworkProvider::where('mcc', '=', $countryId)->first();
		if ($country === NULL) {
			throw new NetworkProviderNotFoundException();
		}
		return $country;
	}
}