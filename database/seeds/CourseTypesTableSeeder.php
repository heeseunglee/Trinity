<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\CourseType;

class CourseTypesTableSeeder extends Seeder {

    public function run()
    {
        CourseType::create([
            'name' => '그룹 교육'
        ]);

        CourseType::create([
            'name' => '1:1 교육'
        ]);

        CourseType::create([
            'name' => '주재원 교육'
        ]);

        CourseType::create([
            'name' => '이그제큐티브 교육'
        ]);
    }

}