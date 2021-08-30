<?php

namespace Database\Seeders;

use App\Models\Residency;
use Illuminate\Database\Seeder;

class ResidencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residencies = [
            ['name' => ['en' => 'Citizen', 'de' => 'Bürger' , 'ar' => 'مواطن']],
            ['name' => ['en' => 'Resident', 'de' => 'Bewohner' , 'ar' => 'مقيم']],
            ['name' => ['en' => 'Visitor', 'de' => 'Besucher' , 'ar' => 'زائر']],
            ['name' => ['en' => 'Student', 'de' => 'Schüler' , 'ar' => 'طالب']],
        ];

        foreach ($residencies as $residency) {
            Residency::create($residency);
        }
    }
}
