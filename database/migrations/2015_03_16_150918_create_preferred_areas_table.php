<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferredAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preferred_areas', function(Blueprint $table)
		{
			$table->increments('id');

            $table->unsignedInteger('preferred_area_group_id');
            $table->foreign('preferred_area_group_id')->references('id')->on('preferred_area_groups');

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
		Schema::drop('preferred_areas');
	}

}
