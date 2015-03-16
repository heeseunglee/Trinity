<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\PreferredAreaGroup;

class PreferredAreaGroupsTableSeeder extends Seeder {

    public function run()
    {
        PreferredAreaGroup::create([
            'name' => '서울특별시'
        ]);

        PreferredAreaGroup::create([
            'name' => '경기도'
        ]);
    }

}