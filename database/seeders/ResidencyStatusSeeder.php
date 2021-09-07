<?php

namespace Database\Seeders;

use App\Models\ResidencyStatus;
use Illuminate\Database\Seeder;

class ResidencyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residencyStatuses = [
            ['name' => ['en' => 'Citizen', 'de' => 'Bürger' , 'ar' => 'مواطن']],
            ['name' => ['en' => 'Resident', 'de' => 'Bewohner' , 'ar' => 'مقيم']],
            ['name' => ['en' => 'Visitor', 'de' => 'Besucher' , 'ar' => 'زائر']],
            ['name' => ['en' => 'Student', 'de' => 'Schüler' , 'ar' => 'طالب']],
        ];

        foreach ($residencyStatuses as $residencyStatus) {
            ResidencyStatus::create($residencyStatus);
        }
    }
}
