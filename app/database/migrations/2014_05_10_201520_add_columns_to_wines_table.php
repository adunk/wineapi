<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToWinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  // We need to do a direct query to modify an exsisting column without dropping and recreating the whole thing.
	  DB::statement("ALTER TABLE wines MODIFY body TEXT NULL");
  
		Schema::table('wines', function(Blueprint $table) {
			$table->string('vintage', 4)->after('name')->nullable();
			$table->integer('winery_id')->after('body')->unsigned();
			$table->foreign('winery_id')->references('id')->on('wineries')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  DB::statement("ALTER TABLE wines MODIFY body TEXT NOT NULL");
	  
		Schema::table('wines', function(Blueprint $table) {
			$table->dropColumn('vintage');
			$table->dropForeign('wines_winery_id_foreign');
			$table->dropColumn('winery_id');
		});
	}

}
