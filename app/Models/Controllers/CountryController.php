<?php

namespace App\Models\Controllers;

use App\Exceptions\Country\CountryNotFoundException;
use App\Models\Country;
use App\Models\Repositories\CountryRepository;

/**
 * Class CountryController
 * @package App\Models\Controllers
 */
class CountryController
{

	/*** @var CountryRepository */
	public CountryRepository $repo;

	/**
	 * AccountController constructor.
	 * @param CountryRepository $repo
	 */
	public function __construct(CountryRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findById(int $id): Country
	{
		return $this->repo->findById($id);
	}

	/**
	 * @param string $mcc
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByMcc(string $mcc): Country
	{
		return $this->repo->findByMcc($mcc);
	}

	/**
	 * @param string $code
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByCode(string $code): Country
	{
		return $this->repo->findByCode($code);
	}

	/**
	 * @param string $additionalCode
	 * @return Country
	 * @throws CountryNotFoundException
	 */
	public function findByAdditionalCode(string $additionalCode): Country
	{
		return $this->repo->findByAdditionalCode($additionalCode);
	}
}