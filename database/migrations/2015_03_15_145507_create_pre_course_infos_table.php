<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreCourseInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pre_course_infos', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('hr_id');
            $table->foreign('hr_id')->references('id')->on('hrs');

            $table->integer('number_of_students');

            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_types');

            $table->unsignedInteger('instructor_visa_type_id');
            $table->foreign('instructor_visa_type_id')->references('id')->on('instructor_visa_types');

            $table->char('instructor_gender', 1);

            $table->integer('instructor_career');

            $table->dateTime('start_datetime');

            $table->dateTime('end_datetime');

            $table->string('running_days');

            $table->dateTime('meeting_datetime');

            $table->text('other_requests')->nullable();

            $table->boolean('is_confirmed')->default(false);

            $table->unsignedInteger('confirmed_by')->nullable();
            $table->foreign('confirmed_by')->references('id')->on('consultants');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pre_course_infos');
	}

}
