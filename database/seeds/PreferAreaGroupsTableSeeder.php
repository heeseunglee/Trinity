<?php
class PreferAreaGroupsTableSeeder extends Seeder {

	public function run()
	{
		PreferAreaGroup::create([
			'name' => '서울특별시'
		]);

		PreferAreaGroup::create([
			'name' => '경기도'
		]);
	}

}