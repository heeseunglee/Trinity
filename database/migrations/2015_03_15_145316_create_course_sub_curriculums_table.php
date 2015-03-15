<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSubCurriculumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_sub_curriculums', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('course_main_curriculum_id');
            $table->foreign('course_main_curriculum_id')->references('id')->on('course_main_curriculums');

            $table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_sub_curriculums');
	}

}
