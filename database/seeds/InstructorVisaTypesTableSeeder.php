<?php

use Illuminate\Database\Seeder;
use App\InstructorVisaType;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class InstructorVisaTypesTableSeeder extends Seeder {

    public function run()
    {
        InstructorVisaType::create([
            'name' => '한국인 (원어민 레벨)',
            'visa_type' => 'KR'
        ]);

        InstructorVisaType::create([
            'name' => '재외국민 (F4 비자 보유자)',
            'visa_type' => 'F4'
        ]);

        InstructorVisaType::create([
            'name' => '원어민 (F2 비자 보유자)',
            'visa_type' => 'F2'
        ]);

        InstructorVisaType::create([
            'name' => '원어민 (F5 비자 보유자)',
            'visa_type' => 'F5'
        ]);
    }

}