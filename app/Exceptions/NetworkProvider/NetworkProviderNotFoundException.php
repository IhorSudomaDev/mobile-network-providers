<?php

namespace App\Exceptions\NetworkProvider;

use Exception;

/**
 * Class NetworkProviderNotFoundException
 * @package App\Exceptions\NetworkProvider
 */
class NetworkProviderNotFoundException extends Exception
{

	/*** @var string */
	protected $message = 'Network Provider Not Found';

}