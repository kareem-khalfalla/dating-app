<?php

namespace Database\Seeders;

use App\Models\ShelterWay;
use Illuminate\Database\Seeder;

class ShelterWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelterWays = [
            ['name' => ['en' => 'alone', 'ar' => 'وحدي', 'de' => 'allein']],
            ['name' => ['en' => 'with family', 'ar' => 'مع العائلة', 'de' => 'mit Familie']],
            ['name' => ['en' => 'with friends', 'ar' => 'مع الأصدقاء', 'de' => 'mit Freunden']],
        ];

        foreach ($shelterWays as $way) {
            ShelterWay::create($way);
        }
    }
}
