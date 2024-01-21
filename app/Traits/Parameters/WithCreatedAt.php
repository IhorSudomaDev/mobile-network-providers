<?php

namespace App\Traits\Parameters;

use Carbon\Carbon;

/**
 * Trait WithCreatedAt
 * @property Carbon created_at
 */
trait WithCreatedAt
{
	/*** @return Carbon */
	public function getCreatedAt(): Carbon
	{
		return $this->created_at;
	}
}