<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\CourseMainCurriculum;
use App\CourseSubCurriculum;

class CourseSubCurriculumsTableSeeder extends Seeder {

    public function run()
    {
        $course_main_curriculum = CourseMainCurriculum::where('name', '더만다린 주재원 교육 프로그램')->firstOrFail();
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '주재원'
        ]);

        $course_main_curriculum = CourseMainCurriculum::where('name', '더만다린 이그제큐티브 교육 프로그램')->firstOrFail();
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '이그제큐티브'
        ]);

        $course_main_curriculum = CourseMainCurriculum::where('name', '더만다린 직무특화 교육 프로그램')->firstOrFail();
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 금융'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 호텔'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 백화점'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 식품업'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 항공'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 무역'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : 은행'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '직무특화 : IT'
        ]);

        $course_main_curriculum = CourseMainCurriculum::where('name', '더만다린 비즈니스 교육 프로그램')->firstOrFail();
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '비즈니스 : 프레젠테이션'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '비즈니스 : 쓰기'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '비즈니스 : 협상'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '비즈니스 : 미팅'
        ]);
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '비즈니스 : 회화'
        ]);

        $course_main_curriculum = CourseMainCurriculum::where('name', '더만다린 일반 교육 프로그램')->firstOrFail();
        CourseSubCurriculum::create([
            'course_main_curriculum_id' => $course_main_curriculum->id,
            'name' => '일반 : 회화'
        ]);
    }

}