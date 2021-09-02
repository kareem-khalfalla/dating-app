<?php

namespace Database\Seeders;

use App\Models\WorkStatus;
use Illuminate\Database\Seeder;

class WorkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workStatus = [
            ['name' => ['en' => 'Working', 'ar' => 'يعمل', 'de' => 'Arbeiten']],
            ['name' => ['en' => 'Student', 'ar' => 'طالب', 'de' => 'Schüler']],
            ['name' => ['en' => 'Job seeker', 'ar' => 'باحث عن عمل', 'de' => 'Arbeitsucher']],
            ['name' => ['en' => 'House wife', 'ar' => 'ربه منزل', 'de' => 'Hausfrau']],
        ];

        foreach ($workStatus as $workStatus) {
            WorkStatus::create($workStatus);
        }
    }
}
