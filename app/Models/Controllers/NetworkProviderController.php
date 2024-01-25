<?php

namespace App\Models\Controllers;

use App\Exceptions\Country\CountryNotFoundException;
use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\Models\NetworkProvider;
use App\Models\Repositories\NetworkProviderRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
	 * @param string $mcc
	 * @param string $mnc
	 * @return NetworkProvider
	 * @throws NetworkProviderNotFoundException
	 * @throws CountryNotFoundException
	 */
	public function findByMccAndMnc(string $mcc, string $mnc): NetworkProvider
	{
		return $this->repo->findByMccAndMnc($mcc, $mnc);
	}

	/*** @return LengthAwarePaginator */
	public function fetchAll(): LengthAwarePaginator
	{
		return $this->repo->fetchAll();
	}

	/**
	 * @param string|NULL $countryCode
	 * @return array
	 * @throws CountryNotFoundException
	 */
	public function fetchAllListFor(?string $countryCode = NULL): array
	{
		return $this->repo->fetchAllListFor($countryCode);
	}

	/*** @return array */
	public function fetchForExport(): array
	{
		return $this->repo->fetchForExport();
	}
}