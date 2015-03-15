<?php

class HrsTableSeeder extends Seeder {

	public function run()
	{
		$company_count = \Company::all()->count();
		$consultant_count = \Consultant::all()->count();
		for($count = 1; $count < 51; $count++) {
			\Hr::create([
				'company_id' => $count % $company_count + 1,
				'consultant_id'=> \Consultant::find(mt_rand(1, $consultant_count))->id
			])->user()->create([
				'account_email' => 'hr'.$count.'@hr.net',
				'password' => \Hash::make('1234'),
				'name_kor' => '인사담당자'.$count,
				'name_eng' => 'Test Hr'.$count,
				'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '010'.rand(10000000, 99999999)),
			]);
		}
	}

}