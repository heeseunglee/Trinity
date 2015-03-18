<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\CourseMainCurriculum;

class CourseMainCurriculumsTableSeeder extends Seeder {

    public function run()
    {
        CourseMainCurriculum::create([
            'name' => '더만다린 주재원 교육 프로그램',
        ]);
        CourseMainCurriculum::create([
            'name' => '더만다린 이그제큐티브 교육 프로그램',
        ]);
        CourseMainCurriculum::create([
            'name' => '더만다린 직무특화 교육 프로그램',
            'can_select_multiple' => true
        ]);
        CourseMainCurriculum::create([
            'name' => '더만다린 비즈니스 교육 프로그램',
            'can_select_multiple' => true
        ]);
        CourseMainCurriculum::create([
            'name' => '더만다린 일반 교육 프로그램',
        ]);
    }

}