<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Country
 * @property string                         title
 * @property string                         mcc
 * @property string                         additional_mcc
 * @property string                         country_code
 * @property string                         additional_country_code
 * @property string                         region
 * @property NetworkProvider[]|HasMany|NULL network_providers
 * @method static whereNull(string $string)
 * @method static where(string $string, string $string1, mixed $string2)
 * @package App\Models
 */
class Country extends AModel
{
	/** @var string */
	protected $table = 'countries';

	/*** @return HasMany */
	public function networkProviders(): HasMany
	{
		return $this->hasMany(NetworkProvider::class, 'country_id', 'id');
	}

	/*** @return string */
	public function getTitle(): string
	{
		return $this->title;
	}

	/*** @param string $title */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/*** @return string */
	public function getMcc(): string
	{
		return $this->mcc;
	}

	/*** @param string $mcc */
	public function setMcc(string $mcc): void
	{
		$this->mcc = $mcc;
	}

	/*** @return string */
	public function getAdditionalMcc(): string
	{
		return $this->additional_mcc;
	}

	/*** @param string $additionalMcc */
	public function setAdditionalMcc(string $additionalMcc): void
	{
		$this->additional_mcc = $additionalMcc;
	}

	/*** @return string */
	public function getCountryCode(): string
	{
		return $this->country_code;
	}

	/*** @param string $countryCode */
	public function setCountryCode(string $countryCode): void
	{
		$this->country_code = $countryCode;
	}

	/*** @return string */
	public function getAdditionalCountryCode(): string
	{
		return $this->additional_country_code;
	}

	/*** @param string $additionalCountryCode */
	public function setAdditionalCountryCode(string $additionalCountryCode): void
	{
		$this->additional_country_code = $additionalCountryCode;
	}

	/*** @return string */
	public function getRegion(): string
	{
		return $this->region;
	}

	/*** @param string $region */
	public function setRegion(string $region): void
	{
		$this->region = $region;
	}

	/**
	 * @param NetworkProvider $networkProvider
	 * @return string
	 */
	public function getActualMcc(NetworkProvider $networkProvider): string
	{
		$mcc = $this->getMcc();
		if ($networkProvider->isIsAdditionalMcc()) {
			$mcc = $this->getAdditionalMcc();
		}
		return $mcc;
	}
}
