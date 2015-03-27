<?php

use App\TestType;
use Illuminate\Database\Seeder;

class TestTypesTableSeeder extends Seeder {

    public function run()
    {
        TestType::create([
            'name' => '입과테스트'
        ]);

        TestType::create([
            'name' => '중간테스트'
        ]);

        TestType::create([
            'name' => '최종테스트'
        ]);
    }

}