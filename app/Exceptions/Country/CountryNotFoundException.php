<?php

namespace App\Exceptions\Country;

use Exception;

/**
 * Class CountryNotFoundException
 * @package App\Exceptions\Country
 */
class CountryNotFoundException extends Exception
{

	/*** @var string */
	protected $message = 'Country Not Found';

}