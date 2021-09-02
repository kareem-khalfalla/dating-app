<?php

namespace Database\Seeders;

use App\Models\AcceptWifeWorkStatus;
use Illuminate\Database\Seeder;

class AcceptWifeWorkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workStatuses = [
            ['name' => ['en' => 'yes','ar' => 'نعم', 'de' => 'ja']],
            ['name' => ['en' => 'should work','ar' => 'يجب ان تعمل', 'de' => 'sollte funktionieren']],
            ['name' => ['en' => 'I do not accept','ar' => 'ﻻ أقبل', 'de' => 'Ich akzeptiere nicht']],
            ['name' => ['en' => 'I don\'t like it but leave it to her','ar' => 'لا أحب ذلك ولاكن اترك الخيار لها', 'de' => 'Ich mag es nicht, aber überlass es ihr']],
            ['name' => ['en' => 'it doesn\'t matter','ar' => 'ﻻ يهم', 'de' => 'es ist egal']],
        ];

        foreach ($workStatuses as $workStatus) {
            AcceptWifeWorkStatus::create($workStatus);
        }
    }
}
