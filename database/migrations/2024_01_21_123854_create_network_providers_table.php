<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class CreateNetworkProvidersTable */
class CreateNetworkProvidersTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up(): void
	{
		Schema::create(
			'network_providers',
			function(Blueprint $table) {
				$table->id();
				$table->integer('country_id')->nullable();
				$table->string('mnc', 3);
				$table->string('title');
				$table->string('operator');
				$table->integer('status');
				$table->timestamp('created_at')->useCurrent();
				$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
				$table->timestamp('deleted_at')->nullable();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('network_providers');
	}
}
