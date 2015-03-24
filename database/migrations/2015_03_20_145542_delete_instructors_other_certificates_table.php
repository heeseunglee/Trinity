<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteInstructorsOtherCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::drop('instructors_other_certificates');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::create('instructors_other_certificates', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('instructor_id')->unsigned()->index();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->integer('other_certificate_id')->unsigned()->index();
            $table->foreign('other_certificate_id')->references('id')->on('other_certificates')->onDelete('cascade');
        });
	}

}
