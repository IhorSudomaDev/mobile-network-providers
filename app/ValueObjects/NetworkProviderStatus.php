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
	/*** @var int */
	public const IMPLEMENT_DESIGN = 6;
	/*** @var int */
	public const PLANNED = 7;
	/*** @var int */
	public const TEMPORARY_OPERATIONAL = 8;

	/*** @var string */
	public const OPERATIONAL_VALUE = 'Operational';
	/*** @var string */
	public const RESERVED_VALUE = 'Reserved';
	/*** @var string */
	public const UNKNOWN_VALUE = 'Unknown';
	/*** @var string */
	public const NOT_OPERATIONAL_VALUE = 'Not Operational';
	/*** @var string */
	public const NOT_OPERATIONAL2_VALUE = 'Not operational';
	/*** @var string */
	public const ONGOING_VALUE = 'Ongoing';
	/*** @var string */
	public const IMPLEMENT_DESIGN_VALUE = 'Implement/Design';
	/*** @var string */
	public const PLANNED_VALUE = 'Planned';
	/*** @var string */
	public const TEMPORARY_OPERATIONAL_VALUE = 'Temporary Operational';

	/**
	 * @param int $id
	 * @return string
	 */
	public static function getStatusFor(int $id): string
	{
		switch ($id) {
			case self::OPERATIONAL:
				$status = 'Operational';
				break;
			case self::RESERVED:
				$status = 'Reserved';
				break;
			case self::UNKNOWN:
				$status = 'Unknown';
				break;
			case self::NOT_OPERATIONAL:
				$status = 'Not Operational';
				break;
			case self::ONGOING:
				$status = 'Ongoing';
				break;
			case self::IMPLEMENT_DESIGN:
				$status = 'Implement/Design';
				break;
			case self::PLANNED:
				$status = 'Planned';
				break;
			case self::TEMPORARY_OPERATIONAL:
				$status = 'Temporary Operational';
				break;
			default:
				$status = 'Undefined ID';
		}
		return $status;
	}

	/**
	 * @param string $status
	 * @return string
	 */
	public static function getStatusIdFor(string $status): string
	{
		switch ($status) {
			case self::OPERATIONAL_VALUE:
				$status = self::OPERATIONAL;
				break;
			case self::RESERVED_VALUE:
				$status = self::RESERVED;
				break;
			case self::UNKNOWN_VALUE:
				$status = self::UNKNOWN;
				break;
			case self::NOT_OPERATIONAL_VALUE:
			case self::NOT_OPERATIONAL2_VALUE:
				$status = self::NOT_OPERATIONAL;
				break;
			case self::ONGOING_VALUE:
				$status = self::ONGOING;
				break;
			case self::IMPLEMENT_DESIGN_VALUE:
				$status = self::IMPLEMENT_DESIGN;
				break;
			case self::PLANNED_VALUE:
				$status = self::PLANNED;
				break;
			case self::TEMPORARY_OPERATIONAL_VALUE:
				$status = self::TEMPORARY_OPERATIONAL;
				break;
			default:
				$status = 0;
		}
		return $status;
	}
}