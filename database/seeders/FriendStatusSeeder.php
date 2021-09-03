<?php

namespace Database\Seeders;

use App\Models\FriendStatus;
use Illuminate\Database\Seeder;

class FriendStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $friendStatuses = [
            ['name' => ['en' => 'I have no problem with that I have no problem with that', 'ar' => 'ليس لدي مشكلة مع أنه ليس لدي مشكلة في ذلك', 'de' => 'Damit habe ich kein Problem, damit habe ich kein Problem']],
            ['name' => ['en' => 'I have my own controls but I have my own controls but', 'ar' => 'لدي ضوابط خاصة بي ولكن لدي ضوابط خاصة بي ولكن', 'de' => 'Ich habe meine eigenen Kontrollen, aber ich habe meine eigenen Kontrollen, aber']],
            ['name' => ['en' => 'I do not have it and I refuse to do so I do not have it and I refuse to do so', 'ar' => 'لا أملكها وأرفض ذلك ، فأنا لا أملكها وأرفض ذلك', 'de' => 'Ich habe es nicht und ich weigere mich, es zu tun Ich habe es nicht und ich weigere mich, es zu tun']],
            ['name' => ['en' => 'Connect with colleagues outside of work Connect with colleagues outside of work', 'ar' => 'تواصل مع الزملاء خارج العمل تواصل مع الزملاء خارج العمل', 'de' => 'Verbinden Sie sich mit Kollegen außerhalb der Arbeit Verbinden Sie sich mit Kollegen außerhalb der Arbeit']],
        ];

        foreach ($friendStatuses as $friendStatus) {
            FriendStatus::create($friendStatus);
        }
    }
}
