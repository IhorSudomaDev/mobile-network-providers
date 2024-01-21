<?php

namespace App\Traits\Parameters;

/**
 * Trait WithCode
 * @property string code
 */
trait WithCode
{
	/*** @return string */
	public function getCode(): string
	{
		return $this->code;
	}

	/*** @param string $code */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}
}