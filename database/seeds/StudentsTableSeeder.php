<?php

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		$positions = [ '사원', '대리', '과장', '차장', '부장' ];

		$company_count = \Company::all()->count();

		for ($count = 1; $count < 301; $count++) {
			\Student::create([
				'company_id' => $count % $company_count + 1,
				'position' => $positions[mt_rand(0, 4)],
				'deputy' => '어떤 사업부 무슨 팀 어디 소속'
			])->user()->create([
				'account_email' => 'stud'.$count.'@stud.net',
				'password' => \Hash::make('1234'),
				'name_kor' => '학생'.$count,
				'name_eng' => 'Test Student'.$count,
				'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '010'.rand(10000000, 99999999)),
			]);
			echo ($count.'/');
		}
	}

}