<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIsCompletedColumnFromLvlTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('lvl_tests', function(Blueprint $table) {
            $table->dropColumn('is_completed');
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
            $table->boolean('is_completed')->default(false);
        });
	}

}
