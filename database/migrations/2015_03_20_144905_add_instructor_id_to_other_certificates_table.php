<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstructorIdToOtherCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('other_certificates', function(Blueprint $table) {
            $table->unsignedInteger('instructor_id')->after('id');
            $table->foreign('instructor_id')->references('id')->on('instructors');
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
        Schema::table('other_certificates', function(Blueprint $table) {
            $table->dropForeign('other_certificates_instructor_id_foreign');
            $table->dropColumn('instructor_id');
        });
	}

}
