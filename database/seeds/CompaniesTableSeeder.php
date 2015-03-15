<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		for ($count = 1; $count <= 20; $count++) {
			\Company::create([
				'name_kor' => '기업 테스트' . $count,
				'name_eng' => 'Test Company' . $count,
				'address_kor' => '서울시 영등포구<br>국제금융로 10<br>투 아이에프씨 22층',
				'address_eng' => 'TWO IFC Level 22<br>10 Gukjegeumyung-rp<br>Yeongdeungpo-gu Seoul',
				'contact_email' => 'contact' . $count . '@asdfasdf.net',
				'contact_number_1' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '020000000'),
				'contact_number_2' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01000000000'),
			]);
		}
	}

}