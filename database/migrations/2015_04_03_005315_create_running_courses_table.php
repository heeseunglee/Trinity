<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunningCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('running_courses', function(Blueprint $table)
        {
            $table->increments('id');

            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedInteger('session');

            $table->dateTime('planned_start_datetime');

            $table->dateTime('planned_end_datetime');

            $table->dateTime('actual_start_datetime')->nullable();

            $table->dateTime('actual_end_datetime')->nullable();

            /**
             * (r)eady
             * (s)tarted : 시작 버튼을 누른 후 15분 간 상태이며 이때만 출석 체크 가능
             * in (p)rogress : 출석 체크는 가능하나 무조건 지각으로만 표시
             * (f)inished : 수업 종료 버튼 누르면 바뀜
             * (c)ompleted : 수업 보고서 작성 후 완료로 변경
             * (s)ame day (c)ancel
             * (a)dvanced (c)ancel
             */
            $table->enum('status', ['r', 's', 'p', 'f', 'c', 'sc', 'ac']);

            $table->text('daily_report')->nullable();

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
		//
        Schema::drop('running_courses');
	}

}
