<?php

namespace App\Models\Repositories;

use App\Exceptions\Country\CountryNotFoundException;
use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\Models\NetworkProvider;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
	 * @param string $mcc
	 * @param string $mnc
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 * @throws CountryNotFoundException
	 */
	public function findByMccAndMnc(string $mcc, string $mnc): NetworkProvider
	{
		$countryId = countryController()->findByMcc($mcc)->getId();
		$country   = NetworkProvider::where('country_id', '=', $countryId)->where('mnc', '=', $mnc)->first();
		if ($country === NULL) {
			throw new NetworkProviderNotFoundException();
		}
		return $country;
	}

	/*** @return LengthAwarePaginator */
	public function fetchAll(): LengthAwarePaginator
	{
		$query = DB::table('network_providers as t1')
			->join('countries as t2', 't1.country_id', '=', 't2.id')
			->join('network_provider_statuses as t3', 't1.status', '=', 't3.id')
			->select(
				[
					't1.id as id',
					't2.mcc as mcc',
					't1.mnc as mnc',
					't1.title as title',
					't1.operator as operator',
					't3.title as status',
				]
			);
		$query->whereNull('t1.deleted_at');
		return $query->paginate(10);
	}

	/**
	 * @param string|NULL $countryCode
	 * @return array
	 * @throws CountryNotFoundException
	 */
	public function fetchAllListFor(?string $countryCode = NULL): array
	{
		$query = DB::table('network_providers as t1')
			->join('countries as t2', 't1.country_id', '=', 't2.id')
			->select(
				[
					't1.id as id',
					't2.mcc as mcc',
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
		$query->whereNull('t1.deleted_at');
		return $query->orderBy('name')->pluck('name', 'id')->toArray();
	}
}