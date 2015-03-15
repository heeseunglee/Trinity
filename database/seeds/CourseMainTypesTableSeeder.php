<?php

class CourseMainTypesTableSeeder extends Seeder {

	public function run()
	{

		CourseMainType::create([
			'name' => '더만다린 주재원 교육 프로그램',
		]);
		CourseMainType::create([
			'name' => '더만다린 이그제큐티브 교육 프로그램',
		]);
		CourseMainType::create([
			'name' => '더만다린 직무특화 교육 프로그램',
			'can_select_multiple' => true
		]);
		CourseMainType::create([
			'name' => '더만다린 비즈니스 교육 프로그램',
			'can_select_multiple' => true
		]);
		CourseMainType::create([
			'name' => '더만다린 일반 교육 프로그램',
		]);
	}

}