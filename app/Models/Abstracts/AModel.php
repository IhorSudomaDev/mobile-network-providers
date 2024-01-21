<?php

namespace App\Models\Abstracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AModel
 * @property integer     id
 * @property Carbon      created_at
 * @property Carbon      updated_at
 * @property Carbon|NULL deleted_at
 * @package App\Models\Abstracts
 */
class AModel extends Model
{
	/*** @var string[] */
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	/*** @return int */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/*** @return Carbon */
	public function getCreatedAt(): Carbon
	{
		return $this->created_at;
	}

	/*** @param Carbon $createdAt */
	public function setCreatedAt(Carbon $createdAt): void
	{
		$this->created_at = $createdAt;
	}

	/*** @return Carbon */
	public function getUpdatedAt(): Carbon
	{
		return $this->updated_at;
	}

	/*** @param Carbon $updatedAt */
	public function setUpdatedAt(Carbon $updatedAt): void
	{
		$this->updated_at = $updatedAt;
	}

	/*** @return Carbon|NULL */
	public function getDeletedAt(): ?Carbon
	{
		return $this->deleted_at;
	}

	/*** @param Carbon|NULL $deletedAt */
	public function setDeletedAt(?Carbon $deletedAt): void
	{
		$this->deleted_at = $deletedAt;
	}
}