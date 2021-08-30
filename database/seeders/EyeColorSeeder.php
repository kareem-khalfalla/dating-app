<?php

namespace Database\Seeders;

use App\Models\EyeColor;
use Illuminate\Database\Seeder;

class EyeColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eyeColors = [
            ['name' => ['en' => 'Black', 'ar' => 'اسود', 'de' => 'Schwarz']],
            ['name' => ['en' => 'Brown', 'ar' => 'بني', 'de' => 'braun']],
            ['name' => ['en' => 'Light brown', 'ar' => 'بني فاتح', 'de' => 'Hellbraun']],
            ['name' => ['en' => 'Blue', 'ar' => 'ازرق', 'de' => 'Blau']],
            ['name' => ['en' => 'Hazel', 'ar' => 'عسلي', 'de' => 'Hasel']],
            ['name' => ['en' => 'Green', 'ar' => 'اخضر', 'de' => 'Grün']],
        ];

        foreach ($eyeColors as $eyeColor) {
            EyeColor::create($eyeColor);
        }

    }
}
