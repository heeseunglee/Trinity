<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\AcademicBackground;

class AcademicBackgroundsTableSeeder extends Seeder {

    public function run()
    {
        AcademicBackground::create([
            'name' => '초등학교 졸업'
        ]);

        AcademicBackground::create([
            'name' => '중학교 졸업'
        ]);

        AcademicBackground::create([
            'name' => '고등학교 졸업'
        ]);

        AcademicBackground::create([
            'name' => '전문대 재학'
        ]);

        AcademicBackground::create([
            'name' => '전문대 졸업'
        ]);

        AcademicBackground::create([
            'name' => '대학교 재학'
        ]);

        AcademicBackground::create([
            'name' => '대학교 졸업'
        ]);

        AcademicBackground::create([
            'name' => '해외대학 재학'
        ]);

        AcademicBackground::create([
            'name' => '해외대학 졸업'
        ]);

        AcademicBackground::create([
            'name' => '대학원 재학'
        ]);

        AcademicBackground::create([
            'name' => '대학원 졸업'
        ]);
    }

}