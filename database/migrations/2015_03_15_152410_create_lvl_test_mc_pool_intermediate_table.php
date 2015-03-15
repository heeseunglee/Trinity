<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLvlTestMcPoolIntermediateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lvl_test_mc_pool_intermediate', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('session')->nullable();
            $table->string('text', 2048)->nullable();
            $table->string('question')->nullable();
            $table->string('example_1')->nullable();
            $table->string('example_2')->nullable();
            $table->string('example_3')->nullable();
            $table->string('example_4')->nullable();
            $table->integer('answer')->nullable();
            $table->string('question_2')->nullable();
            $table->string('example_5')->nullable();
            $table->string('example_6')->nullable();
            $table->string('example_7')->nullable();
            $table->string('example_8')->nullable();
            $table->integer('answer_2')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lvl_test_mc_pool_intermediate');
	}

}
