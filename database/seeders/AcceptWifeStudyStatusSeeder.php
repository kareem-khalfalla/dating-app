<?php

namespace Database\Seeders;

use App\Models\AcceptWifeStudyStatus;
use Illuminate\Database\Seeder;

class AcceptWifeStudyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workStatuses = [
            ['name' => ['en' => 'yes', 'ar' => 'نعم', 'de' => 'ja']],
            ['name' => ['en' => 'I do not accept', 'ar' => 'ﻻ أقبل', 'de' => 'Ich akzeptiere nicht']],
            ['name' => ['en' => 'it doesn\'t matter', 'ar' => 'ﻻ يهم', 'de' => 'es ist egal']],
        ];

        foreach ($workStatuses as $workStatus) {
            AcceptWifeStudyStatus::create($workStatus);
        }
    }
}
