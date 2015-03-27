<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
            $table->increments('id');

            $table->boolean('is_pre_course')->default(false);

            $table->boolean('is_lvl_test')->default(true);

            $table->string('name');

            $table->unsignedInteger('hr_id');
            $table->foreign('hr_id')->references('id')->on('hrs');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_types');

            $table->dateTime('start_datetime');

            $table->dateTime('end_datetime');

            // represents day(s), when the course will be run
            // format : 1,2,3,4,5
            // means that course will run on mon tue wed thur fri
            $table->string('running_days');

            $table->string('location');

            /**
             * 생성된 클래스의 상태를 나타내는 필드로
             *
             * course :     p (in progress),
             *              c (completed),
             *              r (ready),
             *              s (started),
             *              f (finished),
             *              sc (same-day cancel),
             *              ac (advanced cancel)
             */
            $table->enum('status', ['p', 'c', 'r', 's', 'f', 'sc', 'ac']);

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
		Schema::drop('courses');
	}

}
