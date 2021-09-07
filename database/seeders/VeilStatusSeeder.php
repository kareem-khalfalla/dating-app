<?php

namespace Database\Seeders;

use App\Models\VeilStatus;
use Illuminate\Database\Seeder;

class VeilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $veilStatuses = [
            ['name' => ['en' => 'yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻻ', 'de' => 'Nein']],
            ['name' => ['en' => 'I don\'t want to wear it', 'ar' => 'ﻻ وأرغب بارتداءه', 'de' => 'Ich will es nicht tragen']],
            ['name' => ['en' => 'No, but if the husband wants, I will wear it.', 'ar' => 'ﻻ وﻻكن اذا اراد الزوج سأرتديه', 'de' => 'Nein, aber wenn der Mann will, trage ich es.']],
        ];

        foreach ($veilStatuses as $veilStatus) {
            VeilStatus::create($veilStatus);
        }
    }
}
