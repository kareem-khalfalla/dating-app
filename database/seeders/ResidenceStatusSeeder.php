<?php

namespace Database\Seeders;

use App\Models\ResidenceStatus;
use Illuminate\Database\Seeder;

class ResidenceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residenceStatuses = [
            ['name' => ['en' => 'Citizen', 'de' => 'Bürger' , 'ar' => 'مواطن']],
            ['name' => ['en' => 'Resident', 'de' => 'Bewohner' , 'ar' => 'مقيم']],
            ['name' => ['en' => 'Visitor', 'de' => 'Besucher' , 'ar' => 'زائر']],
            ['name' => ['en' => 'Student', 'de' => 'Schüler' , 'ar' => 'طالب']],
        ];

        foreach ($residenceStatuses as $residenceStatus) {
            ResidenceStatus::create($residenceStatus);
        }
    }
}
