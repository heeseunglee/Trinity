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

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->boolean('is_pre_course')->default(false);

            $table->string('name');

            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_types');

            $table->dateTime('start_datetime');

            $table->dateTime('end_datetime');

            $table->string('location');

            // represents day(s), when the course will be run
            // format : 1,2,3,4,5
            // means that course will run on mon tue wed thur fri
            $table->string('running_days');

            /**
             * 생성된 클래스의 상태를 나타내는 필드로
             * 개설요청, 승인진행, 승인완료, 승인반려, 진행, 완료
             */
            $table->string('status');

            $table->boolean('proceed_lvl_test')->default(true);

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
