<?php

use App\Consultant;
use Illuminate\Database\Seeder;

class ConsultantsTableSeeder extends Seeder {

	public function run()
	{
		Consultant::create([
			'is_admin' => true
		])->user()->create([
			'email' => 'final.lee@themandarin.co.kr',
			'password' => \Hash::make('123123'),
			'name_kor' => '이희승',
			'name_eng' => 'Heeseung Lee',
			'private_email' => '1541.hsl@gmail.com',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01063651638'),
            'is_first_login' => false
		]);;

        Consultant::create([
			'is_admin' => true
		])->user()->create([
			'email' => 'han.w.suh@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '서한울',
			'name_eng' => 'Hanwool Suh',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01053229318'),
            'is_first_login' => false
		]);;

		Consultant::create([
			'is_admin' => true
		])->user()->create([
			'email' => 'gin.song@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '송진',
			'name_eng' => 'Gin Song',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01042324278'),
            'is_first_login' => false
		]);;

		Consultant::create([
			'is_admin' => true
		])->user()->create([
			'email' => 'sh.jo@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '조성훈',
			'name_eng' => 'Sunghoon Jo',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01071109949'),
            'is_first_login' => false
		]);;

		Consultant::create([
			'is_admin' => false
		])->user()->create([
			'email' => 'ye.kwon@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '권영은',
			'name_eng' => 'Yeongeun Kwon',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01063627415'),
            'is_first_login' => false
		]);;

        Consultant::create([
            'is_admin' => true
        ])->user()->create([
            'email' => 'sy.lee@themandarin.co.kr',
            'password' => \Hash::make('123123'),
            'name_kor' => '이상영',
            'name_eng' => 'Sangyoung Lee',
            'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01025513269'),
            'is_first_login' => false
        ]);;
	}
}