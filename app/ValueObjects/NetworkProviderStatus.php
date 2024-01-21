<?php

namespace App\ValueObjects;

/**
 * Class NetworkProviderStatus
 * @package App\ValueObjects
 */
class NetworkProviderStatus
{
	/*** @var int */
	public const OPERATIONAL = 1;
	/*** @var int */
	public const RESERVED = 2;
	/*** @var int */
	public const UNKNOWN = 3;
	/*** @var int */
	public const NOT_OPERATIONAL = 4;
	/*** @var int */
	public const ONGOING = 5;
	public const IMPLEMENT_DESIGN = 6;
}