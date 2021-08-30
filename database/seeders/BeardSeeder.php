<?php

namespace Database\Seeders;

use App\Models\Beard;
use Illuminate\Database\Seeder;

class BeardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beards = [
            ['name' => ['en' => 'No', 'ar' => 'ﻻ', 'de' => 'Nein']],
            ['name' => ['en' => 'light', 'ar' => 'خفيفة', 'de' => 'hell']],
            ['name' => ['en' => 'heav', 'ar' => 'كثيفة', 'de' => 'schwer']],
            ['name' => ['en' => 'lon', 'ar' => 'طويلة', 'de' => 'lang']],
        ];

        foreach ($beards as $beard) {
            Beard::create($beard);
        }
    }
}
