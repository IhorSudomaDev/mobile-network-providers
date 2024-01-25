<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Country
 * @property int|NULL                       parent_country_id
 * @property string                         title
 * @property string                         mcc
 * @property string|NULL                    country_code
 * @property string|NULL                    additional_country_code
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

	/*** @return int|NULL */
	public function getParentCountryId(): ?int
	{
		return $this->parent_country_id;
	}

	/*** @param int|NULL $parentCountryId */
	public function setParentCountryId(?int $parentCountryId): void
	{
		$this->parent_country_id = $parentCountryId;
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
	public function getCountryCode(): string
	{
		return $this->country_code;
	}

	/*** @param string $countryCode */
	public function setCountryCode(string $countryCode): void
	{
		$this->country_code = $countryCode;
	}

	/*** @return string|NULL */
	public function getAdditionalCountryCode(): ?string
	{
		return $this->additional_country_code;
	}

	/*** @param string|NULL $additionalCountryCode */
	public function setAdditionalCountryCode(?string $additionalCountryCode): void
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
}
