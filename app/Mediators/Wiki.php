<?php

namespace App\Mediators;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use voku\helper\HtmlDomParser;

/**
 * Class Wiki
 * @package App\Mediators
 */
class Wiki
{
	/*** @var string */
	private string $method = 'POST';
	/*** @var string */
	private string $prefix = 'https://en.wikipedia.org';
	/*** @var string */
	private string $countryListLink = '/wiki/Mobile_country_code';
	/*** @var string */
	private string $countryProviderListLink = '/wiki/Mobile_Network_Codes_in_ITU_region_';

	/**
	 * @param string $countryCode
	 * @param string $mcc
	 * @return array
	 * @throws GuzzleException
	 * @throws GuzzleException
	 */
	public function getProvidersByCountryCodeAndMcc(string $countryCode, string $mcc): array
	{
		$searchedLink        = '';
		$tables              = [];
		$providerList        = [];
		$client              = new Client();
		$countryListResponse = $client->request(
			$this->method,
			sprintf('%s%s', $this->prefix, $this->countryListLink)
		);
		$countryDom          = HtmlDomParser::str_get_html($countryListResponse->getBody()->getContents());
		foreach ($countryDom->find('a') as $element) {
			$link = $element->href;
			if (str_contains($link, $this->countryProviderListLink) && str_contains($link, $countryCode)) {
				$searchedLink = $link;
			}
		}
		$providerListResponse = $client->request(
			$this->method,
			sprintf('%s%s', $this->prefix, $searchedLink)
		);
		$providerDom          = HtmlDomParser::str_get_html($providerListResponse->getBody()->getContents());
		foreach ($providerDom->find('table') as $table) {
			$tables[] = $table;
		}
		$file = storage_path('temp_html');
		file_put_contents($file, array_merge(['<div>'], $tables, ['</div>']));
		if (file_exists($file)) {
			$xmlObj = simplexml_load_string(file_get_contents(storage_path('temp_html')));
			foreach ($xmlObj as $table) {
				$tr = $table->tbody->tr;
				if ($tr[1]->td[0] == $mcc) {
					echo 'Provider(s) found' . PHP_EOL;
					$keys = (array) $tr[0]->th;
					unset($keys['@attributes']);
					unset($tr[0]);
					foreach ($tr as $values) {
						$providerList[] = array_combine($keys, (array) $values->td);
					}
				}
			}
			unlink($file);
		}
		return $providerList;
	}
}