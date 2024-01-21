<?php

namespace App\Models\Abstracts;

use App\Traits\Parameters\WithCreatedAt;
use App\Traits\Parameters\WithId;
use App\Traits\Parameters\WithUpdatedAt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
	use SoftDeletes, WithId, WithCreatedAt, WithUpdatedAt;

	/*** @var string[] */
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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