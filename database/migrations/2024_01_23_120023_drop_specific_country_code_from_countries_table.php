<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class DropSpecificCountryCodeFromCountriesTable */
class DropSpecificCountryCodeFromCountriesTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up(): void
	{
		Schema::table(
			'countries',
			function(Blueprint $table) {
				$table->string('additional_mcc')->nullable()->after('mcc');
				$table->string('country_code', 5)->nullable()->change();
				$table->string('additional_country_code', 5)->nullable()->change();
				$table->dropColumn('specific_country_code');
			});
	}
}
