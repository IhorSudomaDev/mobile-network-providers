<?php

namespace App\Models;

use App\Models\Abstracts\AModel;

/**
 * Class Country
 * @property string title
 * @property string mcc
 * @property string country_code
 * @property string additional_country_code
 * @property string specific_country_code
 * @property string region
 * @method static whereNull(string $string)
 * @method static where(string $string, string $string1, mixed $string2)
 * @package App\Models
 */
class Country extends AModel
{
	/** @var string */
	protected $table = 'countries';

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
	public function getSpecificCountryCode(): string
	{
		return $this->specific_country_code;
	}

	/*** @param string $specificCountryCode */
	public function setSpecificCountryCode(string $specificCountryCode): void
	{
		$this->specific_country_code = $specificCountryCode;
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
