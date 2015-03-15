<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hrs', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            /**
             * 담당 컨설턴트
             */
            $table->unsignedInteger('consultant_id');
            $table->foreign('consultant_id')->references('id')->on('consultants');

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
		Schema::table('hrs', function(Blueprint $table)
		{
            Schema::drop('hrs');
		});
	}

}
