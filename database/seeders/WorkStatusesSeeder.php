<?php

namespace Database\Seeders;

use App\Models\WorkStatuses;
use Illuminate\Database\Seeder;

class WorkStatusesSeeder extends Seeder
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
            ['name' => ['en' => 'House wife', 'ar' => 'ربه منزل', 'de' => 'Hausfrau']],
        ];

        foreach ($workStatus as $workStatus) {
            WorkStatuses::create($workStatus);
        }
    }
}
