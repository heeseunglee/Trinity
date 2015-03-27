<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLvlTestMcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lvl_test_mcs', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('time_left')->default(300000 * 4); // 20 minutes

            $table->dateTime('started_at');

            $table->dateTime('paused_at');

            $table->dateTime('finished_at');

            /**
             * 대기, 진행, 일시정지, 완료
             *
             * (r)eady, in (p)rogress, (pa)used, (c)ompleted
             */
            $table->enum('status', ['r', 'p', 'pa', 'c'])->default('r');

            $table->tinyInteger('proceed_step')->default(0);

            $table->unsignedInteger('question_1');
            $table->foreign('question_1')->references('id')->on('lvl_test_mc_pool_beginner');

            $table->tinyInteger('answer_1');

            $table->unsignedInteger('question_2');
            $table->foreign('question_2')->references('id')->on('lvl_test_mc_pool_beginner');

            $table->tinyInteger('answer_2');

            $table->unsignedInteger('question_3');
            $table->foreign('question_3')->references('id')->on('lvl_test_mc_pool_beginner');

            $table->tinyInteger('answer_3');

            $table->unsignedInteger('question_4');
            $table->foreign('question_4')->references('id')->on('lvl_test_mc_pool_beginner');

            $table->tinyInteger('answer_4');

            $table->unsignedInteger('question_5');
            $table->foreign('question_5')->references('id')->on('lvl_test_mc_pool_beginner');

            $table->tinyInteger('answer_5');

            $table->unsignedInteger('question_6');
            $table->foreign('question_6')->references('id')->on('lvl_test_mc_pool_elementary');

            $table->tinyInteger('answer_6');

            $table->unsignedInteger('question_7');
            $table->foreign('question_7')->references('id')->on('lvl_test_mc_pool_elementary');

            $table->tinyInteger('answer_7');

            $table->unsignedInteger('question_8');
            $table->foreign('question_8')->references('id')->on('lvl_test_mc_pool_elementary');

            $table->tinyInteger('answer_8');

            $table->unsignedInteger('question_9');
            $table->foreign('question_9')->references('id')->on('lvl_test_mc_pool_elementary');

            $table->tinyInteger('answer_9');

            $table->unsignedInteger('question_10');
            $table->foreign('question_10')->references('id')->on('lvl_test_mc_pool_elementary');

            $table->tinyInteger('answer_10');

            $table->unsignedInteger('question_11');
            $table->foreign('question_11')->references('id')->on('lvl_test_mc_pool_intermediate');

            $table->tinyInteger('answer_11');

            $table->unsignedInteger('question_12');
            $table->foreign('question_12')->references('id')->on('lvl_test_mc_pool_intermediate');

            $table->tinyInteger('answer_12');

            $table->unsignedInteger('question_13');
            $table->foreign('question_13')->references('id')->on('lvl_test_mc_pool_intermediate');

            $table->tinyInteger('answer_131');

            $table->tinyInteger('answer_132');

            $table->unsignedInteger('question_14');
            $table->foreign('question_14')->references('id')->on('lvl_test_mc_pool_intermediate');

            $table->tinyInteger('answer_141');

            $table->tinyInteger('answer_142');

            $table->unsignedInteger('question_15');
            $table->foreign('question_15')->references('id')->on('lvl_test_mc_pool_intermediate');

            $table->tinyInteger('answer_15');

            $table->unsignedInteger('question_16');
            $table->foreign('question_16')->references('id')->on('lvl_test_mc_pool_expert');

            $table->tinyInteger('answer_16');

            $table->unsignedInteger('question_17');
            $table->foreign('question_17')->references('id')->on('lvl_test_mc_pool_expert');

            $table->tinyInteger('answer_17');

            $table->unsignedInteger('question_18');
            $table->foreign('question_18')->references('id')->on('lvl_test_mc_pool_expert');

            $table->tinyInteger('answer_18');

            $table->unsignedInteger('question_19');
            $table->foreign('question_19')->references('id')->on('lvl_test_mc_pool_expert');

            $table->tinyInteger('answer_19');

            $table->unsignedInteger('question_20');
            $table->foreign('question_20')->references('id')->on('lvl_test_mc_pool_expert');

            $table->tinyInteger('answer_20');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lvl_test_mcs');
	}

}
