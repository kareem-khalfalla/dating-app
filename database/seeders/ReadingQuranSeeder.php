<?php

namespace Database\Seeders;

use App\Models\ReadingQuran;
use Illuminate\Database\Seeder;

class ReadingQuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readingQurans = [
            ['name' => ['en' => 'read daily', 'ar' => 'أقرأ يوميا', 'de' => 'täglich lesen']],
            ['name' => ['en' => 'read a lot', 'ar' => 'أقرأ كثيرا', 'de' => 'viel lesen']],
            ['name' => ['en' => 'Read a little', 'ar' => 'أقرأ قليلا', 'de' => 'Lesen Sie ein wenig']],
            ['name' => ['en' => 'rarely', 'ar' => 'نادرا', 'de' => 'Kaum']],
            ['name' => ['en' => 'don\'t read', 'ar' => 'ﻻ أقرأ', 'de' => 'nicht lesen']],
        ];

        foreach ($readingQurans as $readingQuran) {
            ReadingQuran::create($readingQuran);
        }
    }
}
