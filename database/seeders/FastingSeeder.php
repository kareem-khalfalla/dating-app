<?php

namespace Database\Seeders;

use App\Models\Fasting;
use Illuminate\Database\Seeder;

class FastingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fastings = [
            ['name' => ['en' => 'Ramadan', 'ar' => 'رمضان', 'de' => 'Ramadan']],
            ['name' => ['en' => 'Ramadan and waffles', 'ar' => 'رمضان ونوافل', 'de' => 'Ramadan und Waffeln']],
            ['name' => ['en' => 'Not every Ramadan', 'ar' => 'ليس كل رمضان', 'de' => 'Nicht jeder Ramadan']],
            ['name' => ['en' => 'I fast some days of Ramadan', 'ar' => 'أصوم بعض أيام رمضان', 'de' => 'Ich faste einige Tage im Ramadan']],
            ['name' => ['en' => 'I don\'t fast', 'ar' => 'ﻻ أصوم', 'de' => 'ich faste nicht']],
        ];

        foreach ($fastings as $fasting) {
            Fasting::create($fasting);
        }
    }
}
