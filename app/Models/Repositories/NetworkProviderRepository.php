<?php

namespace App\Models\Repositories;

use App\Exceptions\Country\CountryNotFoundException;
use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\Models\NetworkProvider;
use DB;

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

	/**
	 * @param string|null $countryCode
	 * @return array
	 * @throws CountryNotFoundException
	 */
	public function fetchAllListFor(?string $countryCode = NULL): array
	{
		$query = DB::table('network_providers as t1')
			->select(
				[
					't1.id as id',
					DB::raw(
						"IF(
						t1.title = '',
						IF(t1.operator = '', CONCAT('[', t1.mnc, ']'), CONCAT('( ', t1.operator, ' )', ' [', t1.mnc, ']')),
						IF(t1.operator = '', CONCAT(t1.title, ' [', t1.mnc, ']'), CONCAT(t1.title, ' ( ', t1.operator, ' )', ' [', t1.mnc, ']'))
						) as 'name'"
					),
				]
			);
		if ($countryCode !== NULL) {
			$query->where('country_id', '=', countryController()->findByCode($countryCode)->getId());
		}
		$query->whereNull('deleted_at');
		return $query->orderBy('name')->pluck('name', 'id')->toArray();
	}
}