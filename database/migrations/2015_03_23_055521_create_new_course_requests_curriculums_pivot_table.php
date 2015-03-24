<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewCourseRequestsCurriculumsPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_course_requests_curriculums', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('new_course_request_id')->unsigned()->index();
			$table->foreign('new_course_request_id')->references('id')->on('new_course_requests')->onDelete('cascade');
            $table->integer('course_sub_curriculum_id')->unsigned()->index();
            $table->foreign('course_sub_curriculum_id')->references('id')->on('course_sub_curriculums')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('new_course_requests_curriculums');
	}

}
