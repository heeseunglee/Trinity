<?php


class InstructorsTableSeeder extends Seeder {

	public function run()
	{
		$bank_count = \Bank::all()->count();
		$genders = [ 'M', 'W' ];
		for($count = 1; $count < 201; $count++) {
			\Instructor::create([
				'name_chn' => '教授'.$count,
				'date_of_birth' => '850106',
				'residence_number' => Crypt::encrypt('850106-1234567'),
				'bank_id' => mt_rand(1, $bank_count),
				'bank_account_number' => Crypt::encrypt('110322651638'),
				'gender' => $genders[mt_rand(0, 1)],
				'age' => 30
			])->user()->create([
				'account_email' => 'inst'.$count.'@inst.net',
				'password' => \Hash::make('1234'),
				'name_kor' => '교수'.$count,
				'name_eng' => 'Test Instructor'.$count,
				'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '010'.rand(10000000, 99999999)),
			]);
		}

	}

}