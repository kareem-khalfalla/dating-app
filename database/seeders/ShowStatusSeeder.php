<?php

namespace Database\Seeders;

use App\Models\ShowStatus;
use Illuminate\Database\Seeder;

class ShowStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $showStatuses = [
            ['name' => ['en' => 'Watch it', 'ar' => 'شاهد هذه', 'de' => 'Schau es dir an']],
            ['name' => ['en' => 'A little', 'ar' => 'القليل', 'de' => 'Ein bisschen']],
            ['name' => ['en' => 'rarely', 'ar' => 'نادرا', 'de' => 'selten']],
            ['name' => ['en' => 'No', 'ar' => 'لا', 'de' => 'Nein']],
            ['name' => ['en' => 'No, and I don\'t want her at home', 'ar' => 'لا ، ولا أريدها في المنزل', 'de' => 'Nein, und ich will sie nicht zu Hause']],
        ];

        foreach ($showStatuses as $showStatus) {
            ShowStatus::create($showStatus);
        }
    }
}