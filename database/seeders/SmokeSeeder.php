<?php

namespace Database\Seeders;

use App\Models\Smoke;
use Illuminate\Database\Seeder;

class SmokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $smokes = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻵ', 'de' => 'Nein']],
            ['name' => ['en' => 'No, I don\'t like it', 'ar' => 'ﻵ وﻻ اطيفه', 'de' => 'nein und ich mag es nicht']],
            ['name' => ['en' => 'a little', 'ar' => 'قليلا', 'de' => 'ein bisschen']],
            ['name' => ['en' => 'Shisha', 'ar' => 'شيشة فقط', 'de' => 'Shisha']],
        ];

        foreach ($smokes as $smoke) {
            Smoke::create($smoke);
        }
    }
}
