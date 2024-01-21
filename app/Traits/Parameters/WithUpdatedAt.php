<?php

namespace App\Traits\Parameters;

use Carbon\Carbon;

/**
 * Trait WithUpdatedAt
 * @property Carbon updated_at
 */
trait WithUpdatedAt
{
	/*** @return Carbon */
	public function getUpdatedAt(): Carbon
	{
		return $this->updated_at;
	}
}