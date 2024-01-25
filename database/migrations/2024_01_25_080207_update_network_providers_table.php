<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class UpdateNetworkProvidersTable */
class UpdateNetworkProvidersTable extends Migration
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
				$table->renameColumn('status', 'status_id');
				$table->dropColumn('is_additional_mcc');
			});
		Schema::table(
			'countries',
			function(Blueprint $table) {
				$table->dropColumn('additional_mcc');
			});
	}
}
