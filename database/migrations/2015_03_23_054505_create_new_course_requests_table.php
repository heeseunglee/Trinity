<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewCourseRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_course_requests', function(Blueprint $table)
		{
			$table->increments('id');

            $table->unsignedInteger('hr_id');
            $table->foreign('hr_id')->references('id')->on('hrs');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_types');

            $table->unsignedInteger('instructor_visa_type_id');
            $table->foreign('instructor_visa_type_id')->references('id')->on('instructor_visa_types');

            $table->char('instructor_gender', 1);

            $table->integer('instructor_career');

            $table->smallInteger('estimated_size');

            $table->dateTime('start_datetime');

            $table->dateTime('end_datetime');

            $table->dateTime('meeting_datetime');

            $table->string('running_days');

            $table->boolean('is_lvl_test')->default(true);

            $table->string('location');

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
		Schema::drop('new_course_requests');
	}

}
