<?php

class CourseSubTypesTableSeeder extends Seeder {

	public function run()
	{
		$course_main_type = \CourseMainType::where('name', '더만다린 주재원 교육 프로그램')->firstOrFail();
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '주재원'
		]);

		$course_main_type = \CourseMainType::where('name', '더만다린 이그제큐티브 교육 프로그램')->firstOrFail();
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '이그제큐티브'
		]);

		$course_main_type = \CourseMainType::where('name', '더만다린 직무특화 교육 프로그램')->firstOrFail();
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 금융'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 호텔'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 백화점'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 식품업'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 항공'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 무역'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : 은행'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '직무특화 : IT'
		]);

		$course_main_type = \CourseMainType::where('name', '더만다린 비즈니스 교육 프로그램')->firstOrFail();
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '비즈니스 : 프레젠테이션'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '비즈니스 : 쓰기'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '비즈니스 : 협상'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '비즈니스 : 미팅'
		]);
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '비즈니스 : 회화'
		]);

		$course_main_type = \CourseMainType::where('name', '더만다린 일반 교육 프로그램')->firstOrFail();
		CourseSubType::create([
			'course_main_type_id' => $course_main_type->id,
			'name' => '일반 : 회화'
		]);
	}

}