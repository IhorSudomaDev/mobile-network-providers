<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*** Class AddParentCountryCodeListToCountriesTable */
class AddParentCountryCodeListToCountriesTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up()
	{
		Schema::table(
			'countries',
			function(Blueprint $table) {
				$table->integer('parent_country_id')->nullable()->after('id');
			});
	}
}
