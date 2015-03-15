<?php

class BanksTableSeeder extends Seeder
{
	public function run()
	{
		$banks = ['KDB 산업은행',
			'NH 농협은행',
			'신한은행',
			'우리은행',
			'Standard Chartered',
			'하나은행',
			'IBK 기업은행',
			'KB 국민은행',
			'KEB 외한은행',
			'citibank',
			'수협은행',
			'DGB 대구은행',
			'BS 부산은행',
			'광주은행',
			'제주은행',
			'전북은행',
			'경남은행',];

		foreach ($banks as $bank) {
			Bank::create([
				'name' => $bank,
			]);
		}
	}
}