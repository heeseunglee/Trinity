<?php

class PreferAreaListsTableSeeder extends Seeder {

	public function run()
	{
		$seoul_id = PreferAreaGroup::where('name', '서울특별시')->first()->id;
		$seoul_borough_array = ['강남구', '강동구', '강북구', '강서구', '관악구',
								'광진구', '구로구', '금천구', '노원구', '도봉구',
								'동대문구', '마포구', '서대문구', '서초구', '성동구',
								'성북구', '송파구', '양천구', '영등포구', '용산구',
								'은평구', '종로구', '중구', '중랑구'];

		$gyung_gi_do_id = PreferAreaGroup::where('name', '경기도')->first()->id;
		$gyung_gi_do_city_array = ['가평군', '고양시', '과천시', '광명시', '광주시',
								'구리시', '군포시', '김포시', '남양주시', '동두천시',
								'부천시', '성남시', '수원시', '시흥시', '안산시',
								'안성시', '안양시', '양주시', '양평군', '여주시',
								'연천군', '오산시', '용인시', '의왕시', '의정부시',
								'이천시', '파주시', '평택시', '포천시', '하남시',
								'화성시'];

		foreach($seoul_borough_array as $borough) {
			PreferAreaList::create([
				'prefer_area_group_id' => $seoul_id,
				'name' => $borough
			]);
		}

		foreach($gyung_gi_do_city_array as $city) {
			PreferAreaList::create([
				'prefer_area_group_id' => $gyung_gi_do_id,
				'name' => $city
			]);
		}
	}

}