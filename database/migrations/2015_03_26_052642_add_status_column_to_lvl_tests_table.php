<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnToLvlTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('lvl_tests', function(Blueprint $table) {
            $table->enum('status', ['w', 'p', 'c'])->after('end_date');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::table('lvl_tests', function(Blueprint $table) {
            $table->dropColumn('status');
        });
	}

}
