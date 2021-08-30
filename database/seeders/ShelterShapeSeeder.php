<?php

namespace Database\Seeders;

use App\Models\ShelterShape;
use Illuminate\Database\Seeder;

class ShelterShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelterShapes = [
            ['name' => ['en' => 'detached house', 'ar' => 'بيت مستقل', 'de' => 'Einfamilienhaus']],
            ['name' => ['en' => 'apartment', 'ar' => 'شقة', 'de' => 'Wohnung']],
            ['name' => ['en' => 'room', 'ar' => 'غرفة', 'de' => 'Raum']],
            ['name' => ['en' => 'student housing', 'ar' => 'سكن طﻻبي', 'de' => 'Studentenwohnheim']],
            ['name' => ['en' => 'shared accommodation', 'ar' => 'سكن مشترك', 'de' => 'WG']],
        ];

        foreach ($shelterShapes as $shape) {
            ShelterShape::create($shape);
        }
    }
}
