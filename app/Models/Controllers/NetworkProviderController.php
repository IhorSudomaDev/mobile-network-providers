<?php

namespace App\Models\Controllers;

use App\Exceptions\Country\CountryNotFoundException;
use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\Models\NetworkProvider;
use App\Models\Repositories\NetworkProviderRepository;

/**
 * Class NetworkProviderController
 * @package App\Models\Controllers
 */
class NetworkProviderController
{
	/*** @var NetworkProviderRepository */
	public NetworkProviderRepository $repo;

	/**
	 * AccountController constructor.
	 * @param NetworkProviderRepository $repo
	 */
	public function __construct(NetworkProviderRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 */
	public function findById(int $id): NetworkProvider
	{
		return $this->repo->findById($id);
	}

	/**
	 * @param int $countryId
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 */
	public function findByCountryId(int $countryId): NetworkProvider
	{
		return $this->repo->findByCountryId($countryId);
	}

	/**
	 * @param string $countryCode
	 * @return array
	 * @throws CountryNotFoundException
	 */
	public function fetchAllListForCountryByCode(string $countryCode): array
	{
		return $this->repo->fetchAllListForCountryByCode($countryCode);
	}
}