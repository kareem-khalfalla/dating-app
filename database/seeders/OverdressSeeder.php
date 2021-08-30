<?php

namespace Database\Seeders;

use App\Models\Overdress;
use Illuminate\Database\Seeder;

class OverdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $overdresses = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻵ', 'de' => 'nein']],
            ['name' => ['en' => 'a little', 'ar' => 'قليلا', 'de' => 'ein bisschen']],
        ];

        foreach ($overdresses as $overdress) {
            Overdress::create($overdress);
        }
    }
}
