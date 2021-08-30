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
            ['name' => ['en' => 'es, but in agreement with the other party', 'ar' => 'نعم ولاكن بالاتفاق مع الطرف الاخر', 'de' => 'Ja, aber im Einvernehmen mit der anderen Partei.']],
            ['name' => ['en' => 'It\'s not in my mind, but if I decide to, I will.', 'ar' => 'ليس الامر في ذهني ولكن اذا قررت ذلك سأفعل', 'de' => 'Es ist nicht in meinem Kopf, aber wenn ich mich entscheide, werde ich es tun.']],
            ['name' => ['en' => 'It\'s not in my mind, but if I decide to, I don\'t do it without her consent', 'ar' => 'ليس الامر في ذهني ولكن اذا قررت ذلك لا أفعل دون رضاها', 'de' => 'Es ist nicht in meinem Kopf, aber wenn ich mich entscheide, tue ich es nicht ohne ihre Zustimmung']],
            ['name' => ['en' => 'Accept', 'ar' => 'اقبل', 'de' => 'Annehmen']],
            ['name' => ['en' => 'I accept if he was previously married and I do not accept that he gets married after me', 'ar' => 'اقبل اذا كان متزوج سابقا وﻻ أقبل ان يتزوج بعدي', 'de' => 'Ich akzeptiere, wenn er zuvor verheiratet war und ich akzeptiere nicht, dass er nach mir heiratet']],
            ['name' => ['en' => 'I do not accept', 'ar' => 'ﻻ اقبل', 'de' => 'Ich akzeptiere nicht']],
            ['name' => ['en' => 'May we agree on that', 'ar' => 'قد نتفق على ذلك', 'de' => 'Dürfen wir uns darauf einigen']],
        ];

        foreach ($polygamyStatuses as $polygamyStatus) {
            PolygamyStatus::create($polygamyStatus);
        }
    }
}
