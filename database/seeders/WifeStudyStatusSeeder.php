<?php

namespace Database\Seeders;

use App\Models\WifeStudyStatus;
use Illuminate\Database\Seeder;

class WifeStudyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studyStatuses = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻻ', 'de' => 'Nein']],
            ['name' => ['en' => 'No, but I leave the choice to her.', 'ar' => 'ﻻ وﻻكن اترك الخيار لها', 'de' => 'Nein, aber ich überlasse ihr die Wahl.']],
            ['name' => ['en' => 'Yes, if I may.', 'ar' => 'نعم اذا اذن لي', 'de' => 'Ja, wenn ich darf.']],
        ];

        foreach ($studyStatuses as $studyStatus) {
            WifeStudyStatus::create($studyStatus);
        }
    }
}
