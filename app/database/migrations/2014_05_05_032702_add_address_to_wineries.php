<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAddressToWineries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wineries', function(Blueprint $table) {
			$table->string('street_address_1')->after('body');
			$table->string('street_address_2')->nullable()->after('street_address_1');
			$table->string('city', 64)->after('street_address_2');
			$table->string('state', 64)->after('city');
			$table->string('zip', 10)->after('state');
			$table->string('country', 64)->after('zip');
			$table->string('email')->after('country');
			$table->string('phone', 20)->after('email');
			$table->string('url', 2083)->after('phone');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wineries', function(Blueprint $table) {
			$table->dropColumn('street_address_1');
			$table->dropColumn('street_address_2');
			$table->dropColumn('city');
			$table->dropColumn('state');
			$table->dropColumn('zip');
			$table->dropColumn('country');
			$table->dropColumn('email');
			$table->dropColumn('phone');
			$table->dropColumn('url');
		});
	}

}
