<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('name')->unique();

            $table->smallInteger('postcode_1');

            $table->smallInteger('postcode_2');

            $table->string('address_1');

            $table->string('address_2');

            $table->string('contact_email')->nullable();

            $table->string('contact_number_1');

            $table->string('contact_number_2')->nullable();

            $table->string('logo_image')->default('no_image');

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
		Schema::table('companies', function(Blueprint $table)
		{
            Schema::drop('companies');
		});
	}

}
