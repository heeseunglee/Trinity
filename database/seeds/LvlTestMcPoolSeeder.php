<?php

use Illuminate\Database\Seeder;

class LvlTestMcPoolSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('LvlTestMcPoolBeginnerTableSeeder');
        $this->call('LvlTestMcPoolElementaryTableSeeder');
        $this->call('LvlTestMcPoolIntermediateTableSeeder');
        $this->call('LvlTestMcPoolExpertTableSeeder');
	}

}
