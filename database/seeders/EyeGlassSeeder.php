<?php

namespace Database\Seeders;

use App\Models\EyeGlass;
use Illuminate\Database\Seeder;

class EyeGlassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eyeGlasses = [
            ['name' => ['en' => 'No', 'ar' => 'ﻵ', 'de' => 'Nein']],
            ['name' => ['en' => 'Eyeglass', 'ar' => 'نظارة', 'de' => 'Brille']],
            ['name' => ['en' => 'Contact lenses', 'ar' => 'عدسات', 'de' => 'Kontaktlinsen']],
        ];

        foreach ($eyeGlasses as $eyeGlass) {
            EyeGlass::create($eyeGlass);
        }
    }
}
