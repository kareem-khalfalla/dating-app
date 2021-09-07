<?php

namespace Database\Seeders;

use App\Models\BeardStatus;
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
        $beardStatuses = [
            ['name' => ['en' => 'No', 'ar' => 'ﻻ', 'de' => 'Nein']],
            ['name' => ['en' => 'light', 'ar' => 'خفيفة', 'de' => 'hell']],
            ['name' => ['en' => 'heav', 'ar' => 'كثيفة', 'de' => 'schwer']],
            ['name' => ['en' => 'lon', 'ar' => 'طويلة', 'de' => 'lang']],
        ];

        foreach ($beardStatuses as $beardStatus) {
            BeardStatus::create($beardStatus);
        }
    }
}
