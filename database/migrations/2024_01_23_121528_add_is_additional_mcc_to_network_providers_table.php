<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class AddIsAdditionalMccToNetworkProvidersTable */
class AddIsAdditionalMccToNetworkProvidersTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up(): void
	{
		Schema::table(
			'network_providers',
			function(Blueprint $table) {
				$table->boolean('is_additional_mcc')->after('status')->default(0);
			});
	}
}
