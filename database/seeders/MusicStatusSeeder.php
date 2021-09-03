<?php

namespace Database\Seeders;

use App\Models\MusicStatus;
use Illuminate\Database\Seeder;

class MusicStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $musicStatuses = [
            ['name' => ['en' => 'Listen', 'ar' => 'استمع', 'de' => 'Hören']],
            ['name' => ['en' => 'Listen a little', 'ar' => 'استمع قليلا', 'de' => 'Hör ein bisschen zu']],
            ['name' => ['en' => 'I hear, but I want to leave it', 'ar' => 'أسمع ، لكني أريد أن أتركه', 'de' => 'Ich höre, aber ich möchte es lassen']],
            ['name' => ['en' => 'I don\'t hear songs', 'ar' => 'أنا لا أسمع الأغاني', 'de' => 'Ich höre keine Lieder']],
            ['name' => ['en' => 'I do not hear and I do not want her at home', 'ar' => 'لا اسمعها ولا اريدها في البيت', 'de' => 'Ich höre nicht und ich will sie nicht zu Hause']],
        ];

        foreach ($musicStatuses as $musicStatus) {
            MusicStatus::create($musicStatus);
        }
    }
}