<?php

namespace Database\Seeders;

use App\Models\Prayer;
use Illuminate\Database\Seeder;

class PrayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prayers = [
            ['name' => ['en' => 'committed to', 'ar' => 'ملتزم بها', 'de' => 'verpflichtet']],
            ['name' => ['en' => 'Not original', 'ar' => 'ﻻ أصلى', 'de' => 'Nicht original']],
            ['name' => ['en' => 'Original and leave', 'ar' => 'اصلي و اترك', 'de' => 'Original und verlasse']],
            ['name' => ['en' => 'Friday only', 'ar' => 'الجمعة فقط', 'de' => 'nur Freitag']],
            ['name' => ['en' => 'mostly original', 'ar' => 'اصلي غالبا', 'de' => 'meist originell']],
        ];

        foreach ($prayers as $prayer) {
            Prayer::create($prayer);
        }
    }
}
