<?php

namespace Database\Seeders;

use App\Models\RobeStatus;
use Illuminate\Database\Seeder;

class RobeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $robeStatuses = [
            ['name' => ['en' => 'full robeStatuses', 'ar' => 'جلباب كامل', 'de' => 'volle Roben']],
            ['name' => ['en' => 'jilbab covering the knees', 'ar' => 'جلباب يغطي الركبتين', 'de' => 'Jilabab, der die Knie bedeckt']],
            ['name' => ['en' => 'jilbab covering the waist', 'ar' => 'جلباب يغطي الوسط', 'de' => 'Jilabab, der die Taille bedeckt']],
            ['name' => ['en' => 'La jilbab', 'ar' => 'ﻻ جلباب', 'de' => 'La Dschilbab']],
            ['name' => ['en' => 'No, but I\'d like to wear it', 'ar' => 'ﻻ ولكني أرغب بارتداءه', 'de' => 'Nein, aber ich würde es gerne tragen']],
        ];

        foreach ($robeStatuses as $robe) {
            RobeStatus::create($robe);
        }
    }
}
