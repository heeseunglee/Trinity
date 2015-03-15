<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesCurriculumsPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_curriculums_pivot', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('course_sub_curriculum_id')->unsigned()->index();
            $table->foreign('course_sub_curriculum_id')->references('id')->on('course_sub_curriculums')->onDelete('cascade');
            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses_curriculums_pivot');
	}

}
