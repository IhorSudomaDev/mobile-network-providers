<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class AddForeignKeyToNetworkProvidersTable */
class AddForeignKeyToNetworkProvidersTable extends Migration
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
				$table->bigInteger('country_id')->unsigned()->nullable()->change();
				$table->index('country_id');
				$table->foreign('country_id')->references('id')->on('countries');
			});
	}
}
