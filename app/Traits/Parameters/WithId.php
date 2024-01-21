<?php

namespace App\Traits\Parameters;

/**
 * Trait WithId
 * @property int id
 */
trait WithId
{
	/*** @return int */
	public function getId(): int
	{
		return $this->id;
	}

}