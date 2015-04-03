<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnsToCoursesStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('courses_students',  function(Blueprint $table) {
            $table->integer('mid_lvl_test_id')->unsigned()->nullable();
            $table->foreign('mid_lvl_test_id')->references('id')->on('lvl_tests')->onDelete('cascade');
            $table->integer('final_lvl_test_id')->unsigned()->nullable();
            $table->foreign('final_lvl_test_id')->references('id')->on('lvl_tests')->onDelete('cascade');
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
        Schema::table('courses_students',  function(Blueprint $table) {
            $table->dropForeign('courses_students_mid_lvl_test_id_foreign');
            $table->dropForeign('courses_students_final_lvl_test_id_foreign');

            $table->dropColumn('mid_lvl_test_id');
            $table->dropColumn('final_lvl_test_id');
        });
	}

}
