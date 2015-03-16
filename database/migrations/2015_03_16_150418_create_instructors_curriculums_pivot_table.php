<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsCurriculumsPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors_curriculums', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('course_sub_curriculum_id')->unsigned()->index();
            $table->foreign('course_sub_curriculum_id')->references('id')->on('course_sub_curriculums')->onDelete('cascade');
            $table->integer('instructor_id')->unsigned()->index();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructors_curriculums');
	}

}
