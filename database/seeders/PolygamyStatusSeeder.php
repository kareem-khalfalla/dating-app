<?php

namespace Database\Seeders;

use App\Models\PolygamyStatus;
use Illuminate\Database\Seeder;

class PolygamyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polygamyStatuses = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻻ', 'de' => 'Nein']],
            ['name' => ['en' => 'Yes, but in agreement with the other party', 'ar' => 'نعم ولاكن بالاتفاق مع الطرف الاخر', 'de' => 'Ja, aber im Einvernehmen mit der anderen Partei.']],
            ['name' => ['en' => 'It\'s not in my mind, but if I decide to, I will.', 'ar' => 'ليس الامر في ذهني ولكن اذا قررت ذلك سأفعل', 'de' => 'Es ist nicht in meinem Kopf, aber wenn ich mich entscheide, werde ich es tun.']],
            ['name' => ['en' => 'It\'s not in my mind, but if I decide to, I don\'t do it without her consent', 'ar' => 'ليس الامر في ذهني ولكن اذا قررت ذلك لا أفعل دون رضاها', 'de' => 'Es ist nicht in meinem Kopf, aber wenn ich mich entscheide, tue ich es nicht ohne ihre Zustimmung']],
        ];

        foreach ($polygamyStatuses as $polygamyStatus) {
            PolygamyStatus::create($polygamyStatus);
        }
    }
}
