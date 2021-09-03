<?php

namespace Database\Seeders;

use App\Models\WifePolygamyStatus;
use Illuminate\Database\Seeder;

class WifePolygamyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wifePolygamyStatuses = [
            ['name' => ['en' => 'Accept', 'ar' => 'اقبل', 'de' => 'Annehmen']],
            ['name' => ['en' => 'I accept if he was previously married and I do not accept that he gets married after me', 'ar' => 'اقبل اذا كان متزوج سابقا وﻻ أقبل ان يتزوج بعدي', 'de' => 'Ich akzeptiere, wenn er zuvor verheiratet war und ich akzeptiere nicht, dass er nach mir heiratet']],
            ['name' => ['en' => 'I do not accept', 'ar' => 'ﻻ اقبل', 'de' => 'Ich akzeptiere nicht']],
            ['name' => ['en' => 'May we agree on that', 'ar' => 'قد نتفق على ذلك', 'de' => 'Dürfen wir uns darauf einigen']],
        ];

        foreach ($wifePolygamyStatuses as $wifePolygamyStatus) {
            WifePolygamyStatus::create($wifePolygamyStatus);
        }
    }
}
