<?php

namespace Database\Seeders;

use App\Models\HalalFood;
use Illuminate\Database\Seeder;

class HalalFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $halalFoods = [
            ['name' => ['en' => 'Halal only', 'ar' => 'حلال فقط', 'de' => 'nur halal']],
            ['name' => ['en' => 'Halal if exists', 'ar' => 'حلال اذا توفر', 'de' => 'Halal wenn verfügbar']],
            ['name' => ['en' => 'Not a problem', 'ar' => 'ﻻ يهم', 'de' => 'Es spielt keine Rolle']],
            ['name' => ['en' => 'Vegetarian', 'ar' => 'نباتي', 'de' => 'Vegetarier']],
        ];

        foreach ($halalFoods as $halalFood) {
            HalalFood::create($halalFood);
        }
    }
}
