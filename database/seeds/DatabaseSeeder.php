<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

        $this->call('LvlTestMcPoolBeginnerTableSeeder');
        $this->call('LvlTestMcPoolElementaryTableSeeder');
        $this->call('LvlTestMcPoolIntermediateTableSeeder');
        $this->call('LvlTestMcPoolExpertTableSeeder');
        $this->call('ConsultantsTableSeeder');
	}

}
