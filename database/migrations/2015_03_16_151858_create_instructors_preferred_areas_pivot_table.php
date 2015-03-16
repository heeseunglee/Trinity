<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsPreferredAreasPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors_preferred_areas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('preferred_area_id')->unsigned()->index();
            $table->foreign('preferred_area_id')->references('id')->on('preferred_areas')->onDelete('cascade');
            $table->integer('instructor_id')->unsigned()->index();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructors_preferred_areas');
	}

}
