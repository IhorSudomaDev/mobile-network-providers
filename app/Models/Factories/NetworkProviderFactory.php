<?php

namespace App\Models\Factories;

use App\Models\NetworkProvider;

/**
 * Class NetworkProviderFactory
 * @package App\Models\Factories
 */
class NetworkProviderFactory
{
	/**
	 * @param string   $mnc
	 * @param string   $title
	 * @param string   $operator
	 * @param int      $status
	 * @param int|NULL $countryId
	 * @return NetworkProvider
	 */
	public static function create(string $mnc, string $title, string $operator, int $status, ?int $countryId = NULL): NetworkProvider
	{
		$networkProvider = new NetworkProvider();
		if ($countryId !== NULL) {
			$networkProvider->setCountryId($countryId);
		}
		$networkProvider->setMnc($mnc);
		$networkProvider->setTitle($title);
		$networkProvider->setOperator($operator);
		$networkProvider->setStatus($status);
		$networkProvider->save();
		$networkProvider->refresh();
		return $networkProvider;
	}

}