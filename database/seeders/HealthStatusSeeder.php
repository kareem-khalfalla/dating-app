<?php

namespace Database\Seeders;

use App\Models\HealthStatus;
use Illuminate\Database\Seeder;

class HealthStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $healthStatuses = [
            ['name' => ['en' => 'Good', 'ar' => 'جيدة', 'de' => 'gut']],
            ['name' => ['en' => 'Some persistent diseases', 'ar' => 'بعض الامراض المستديمه', 'de' => 'Einige hartnäckige Krankheiten']],
            ['name' => ['en' => 'Partial handicap', 'ar' => 'اعاقه جزئيه', 'de' => 'teilweise Behinderung']],
        ];

        foreach ($healthStatuses as $healthStatus) {
            HealthStatus::create($healthStatus);
        }
    }
}
