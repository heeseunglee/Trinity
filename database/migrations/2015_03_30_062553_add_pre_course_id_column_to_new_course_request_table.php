<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreCourseIdColumnToNewCourseRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('new_course_requests',  function(Blueprint $table) {
            $table->unsignedInteger('pre_course_id')->nullable()->after('approved_by');
            $table->foreign('pre_course_id')->references('id')->on('courses');
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
        Schema::table('new_course_requests',  function(Blueprint $table) {
            $table->dropForeign('new_course_requests_pre_course_id_foreign');
            $table->dropColumn('pre_course_id');
        });
	}

}
