<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class CreateCountriesTable */
class CreateCountriesTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'countries',
			function(Blueprint $table) {
				$table->id();
				$table->string('title', 100);
				$table->string('mcc', 3)->nullable();
				$table->string('country_code', 3)->nullable();
				$table->string('additional_country_code', 3)->nullable();
				$table->string('specific_country_code', 7)->nullable();
				$table->string('region', 20)->nullable();
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
		Schema::dropIfExists('countries');
	}
}
