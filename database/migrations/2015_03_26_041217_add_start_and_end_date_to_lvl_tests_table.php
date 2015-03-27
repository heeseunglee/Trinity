<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartAndEndDateToLvlTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('lvl_tests', function(Blueprint $table) {
            $table->date('start_date')->after('course_id');
            $table->date('end_date')->after('start_date');
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
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
	}

}
