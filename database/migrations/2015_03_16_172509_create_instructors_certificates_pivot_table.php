<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsCertificatesPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors_certificates', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('instructor_id')->unsigned()->index();
			$table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
			$table->integer('certificate_id')->unsigned()->index();
			$table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructors_certificates');
	}

}
