<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class NetworkProvider
 * @property int          country_id
 * @property string       mnc
 * @property string       title
 * @property string       operator
 * @property int          status_id
 * @property Country|NULL country
 * @method static whereNull(string $string)
 * @method static where(string $string, string $string1, mixed $string2)
 * @package App\Models
 */
class NetworkProvider extends AModel
{
	/** @var string */
	protected $table = 'network_providers';

	/** @return BelongsTo */
	public function country(): BelongsTo
	{
		return $this->belongsTo(Country::class);
	}

	/*** @return int */
	public function getCountryId(): int
	{
		return $this->country_id;
	}

	/*** @param int $countryId */
	public function setCountryId(int $countryId): void
	{
		$this->country_id = $countryId;
	}

	/*** @return string */
	public function getMnc(): string
	{
		return $this->mnc;
	}

	/*** @param string $mnc */
	public function setMnc(string $mnc): void
	{
		$this->mnc = $mnc;
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
	public function getOperator(): string
	{
		return $this->operator;
	}

	/*** @param string $operator */
	public function setOperator(string $operator): void
	{
		$this->operator = $operator;
	}

	/*** @return int */
	public function getStatusId(): int
	{
		return $this->status_id;
	}

	/*** @param int $statusId */
	public function setStatusId(int $statusId): void
	{
		$this->status_id = $statusId;
	}
}
