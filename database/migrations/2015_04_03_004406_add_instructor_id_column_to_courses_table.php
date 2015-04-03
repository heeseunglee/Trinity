<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstructorIdColumnToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('courses',  function(Blueprint $table) {
            $table->unsignedInteger('instructor_id')->nullable()->after('name');
            $table->foreign('instructor_id')->references('id')->on('instructors');
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
        Schema::table('courses',  function(Blueprint $table) {
            $table->dropForeign('courses_instructor_id_foreign');
            $table->dropColumn('instructor_id');
        });
	}

}
