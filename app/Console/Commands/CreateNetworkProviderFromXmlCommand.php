<?php

namespace App\Console\Commands;

use App\Models\NetworkProvider;
use App\ValueObjects\NetworkProviderStatus;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use RuntimeException;

/**
 * Class CreateNetworkProviderFromXmlCommand
 * @package App\Console\Commands
 */
class CreateNetworkProviderFromXmlCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'mnp:xml-create';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Create new records i n network providers table';

	/**
	 * Execute the console command.
	 * @return void
	 * @throws GuzzleException
	 */
	public function handle(): void
	{
		$countryCode = $this->ask('Country code');
		$mcc         = $this->ask('MCC');
		$id          = $this->ask('Country ID');
		$count       = 0;
		$providers   = wiki()->getProvidersByCountryCodeAndMcc($countryCode, $mcc);
		if (empty($providers)) {
			throw new RuntimeException(sprintf('Provider(s) for %s, %s not found', $countryCode, $mcc));
		}
		foreach ($providers as $provider) {
			$networkProvider = new NetworkProvider();
			$networkProvider->setCountryId($id);
			$networkProvider->setMnc($provider['MNC']);
			$networkProvider->setTitle($provider['Brand']);
			$networkProvider->setOperator($provider['Operator']);
			$networkProvider->setStatusId(NetworkProviderStatus::getStatusIdFor($provider['Status']));
			$networkProvider->save();
			echo 'New provider was successfully created' . PHP_EOL;
			$count++;
			sleep(1);
		}
		echo $count . ' provider(s) for ' . $countryCode . ' with ' . $mcc . ' mcc was created';
	}
}
