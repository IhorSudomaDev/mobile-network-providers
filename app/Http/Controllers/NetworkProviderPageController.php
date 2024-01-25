<?php

namespace App\Http\Controllers;

use App\Exceptions\NetworkProvider\NetworkProviderNotFoundException;
use App\ValueObjects\NetworkProviderStatus;
use Illuminate\Http\Request;

/**
 * Class NetworkProviderPageController
 * @package App\Http\Controllers
 */
class NetworkProviderPageController extends Controller
{
	/**
	 * @param Request $request
	 * @return false|string
	 * @throws NetworkProviderNotFoundException
	 */
	public function getPopupInfo(Request $request)
	{
		$networkProviderId    = $request->get('network_provider_id');
		$networkProvider      = networkProviderController()->findById($networkProviderId);
		$country              = $networkProvider->country;
		$data['mnc']          = empty($networkProvider->getMnc()) ? '-' : $networkProvider->getMnc();
		$data['title']        = empty($networkProvider->getTitle()) ? '-' : $networkProvider->getTitle();
		$data['operator']     = empty($networkProvider->getOperator()) ? '-' : $networkProvider->getOperator();
		$data['status']       = NetworkProviderStatus::getStatusFor($networkProvider->getStatusId());
		$data['country']      = $country->getTitle();
		$data['country_code'] = empty($country->getCountryCode()) ? '-' : $country->getCountryCode();
		$data['region']       = $country->getRegion();
		$data['mcc']          = $country->getMcc($networkProvider);
		$data['success']      = 1;
		return json_encode($data);
	}
}
