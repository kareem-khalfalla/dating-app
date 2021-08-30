<?php

namespace Database\Seeders;

use App\Models\Children;
use Illuminate\Database\Seeder;

class ChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $childrenStatuses = [
            ['name' => ['en' => 'Yes, but they are not with me', 'ar' => 'نعم ولاكن ليسوا معي', 'de' => 'Ja, aber sie sind nicht bei mir']],
            ['name' => ['en' => 'Yes, but not now', 'ar' => 'نعم ﻻكن ليس الان', 'de' => 'Ja, aber nicht jetzt']],
            ['name' => ['en' => 'According to the wishes of the other party', 'ar' => 'بحسب رغبة الطرف الاخر', 'de' => 'Gemäß den Wünschen der anderen Partei']],
        ];

        foreach ($childrenStatuses as $childrenStatus) {
            Children::create($childrenStatus);
        }
    }
}
