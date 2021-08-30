<?php

namespace Database\Seeders;

use App\Models\Alcohol;
use Illuminate\Database\Seeder;

class AlcoholSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alcohols = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻵ', 'de' => 'Nein']],
            ['name' => ['en' => 'No, I don\'t like it', 'ar' => 'ﻵ وﻻ اطيفه', 'de' => 'nein und ich mag es nicht']],
            ['name' => ['en' => 'a little', 'ar' => 'قليلا', 'de' => 'ein bisschen']],
        ];

        foreach ($alcohols as $alcohol) {
            Alcohol::create($alcohol);
        }
    }
}
