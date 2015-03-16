<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Certificate;

class CertificatesTableSeeder extends Seeder {

    public function run()
    {
        Certificate::create([
            'name' => 'HSK',
            'grade' => '1급'
        ]);

        Certificate::create([
            'name' => 'HSK',
            'grade' => '2급'
        ]);

        Certificate::create([
            'name' => 'HSK',
            'grade' => '3급'
        ]);

        Certificate::create([
            'name' => 'HSK',
            'grade' => '4급'
        ]);

        Certificate::create([
            'name' => 'HSK',
            'grade' => '5급'
        ]);

        Certificate::create([
            'name' => 'HSK',
            'grade' => '6급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '1급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '2급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '3급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '4급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '5급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '6급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '7급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '8급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '9급'
        ]);

        Certificate::create([
            'name' => 'TSC',
            'grade' => '10급'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Novice Low'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Novice Mid'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Novice High'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Intermediate Low'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Intermediate Mid'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Intermediate High'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Advanced Low'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Advanced Mid'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Advanced High'
        ]);

        Certificate::create([
            'name' => 'Opic 중국어',
            'grade' => 'Superior'
        ]);

        Certificate::create([
            'name' => 'BCT',
            'grade' => '1급'
        ]);

        Certificate::create([
            'name' => 'BCT',
            'grade' => '2급'
        ]);

        Certificate::create([
            'name' => 'BCT',
            'grade' => '3급'
        ]);

        Certificate::create([
            'name' => 'BCT',
            'grade' => '4급'
        ]);

        Certificate::create([
            'name' => 'BCT',
            'grade' => '5급'
        ]);

        Certificate::create([
            'name' => '운전면허증'
        ]);

    }

}