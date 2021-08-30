<?php

namespace Database\Seeders;

use App\Models\Relocate;
use Illuminate\Database\Seeder;

class RelocateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relocates = [
            ['name' => ['en' => 'Accept', 'ar' => 'أقبل', 'de' => 'Ich stimme zu']],
            ['name' => ['en' => 'Refuse', 'ar' => 'ﻻ أقبل', 'de' => 'Ich stimme nicht zu']],
            ['name' => ['en' => 'Accept due to nearby city', 'ar' => 'أقبل الى مدينة قريبة', 'de' => 'Stadt in der Nähe zu akzeptieren']],
            ['name' => ['en' => 'Accept due to be inside my hometown', 'ar' => 'أقبل داخل دولتي', 'de' => 'Ich komme in mein Land']],
            ['name' => ['en' => 'Accept due to nearby country', 'ar' => 'أقبل الى دولة قريبة', 'de' => 'In ein nahegelegenes Land kommen']],
        ];

        foreach ($relocates as $relocate) {
            Relocate::create($relocate);
        }
    }
}
