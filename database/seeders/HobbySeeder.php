<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hobbies = [
            ['name' => ['en' => 'Sport', 'ar' => 'رياضة', 'de' => 'Sport']],
            ['name' => ['en' => 'Reading', 'ar' => 'قراءة', 'de' => 'Lektüre']],
            ['name' => ['en' => 'Writing', 'ar' => 'كتابة', 'de' => 'Schreiben']],
            ['name' => ['en' => 'Travel', 'ar' => 'سفر', 'de' => 'Reisen']],
            ['name' => ['en' => 'Games', 'ar' => 'العاب', 'de' => 'Spiele']],
            ['name' => ['en' => 'Computer', 'ar' => 'كمبيوتر', 'de' => 'Rechner']],
            ['name' => ['en' => 'Spoking', 'ar' => 'التحدث', 'de' => 'Sprechen']],
            ['name' => ['en' => 'Go to cafe', 'ar' => 'الذهاب الى الكافيتريا', 'de' => 'Gehe ins Café']],
            ['name' => ['en' => 'Rough games', 'ar' => 'العاب الشده', 'de' => 'Harte Spiele']],
            ['name' => ['en' => 'Chess', 'ar' => 'الشطرنج', 'de' => 'Schach']],
            ['name' => ['en' => 'Disko', 'ar' => 'الديسكو', 'de' => 'Disko']],
            ['name' => ['en' => 'Stay at natural', 'ar' => 'الجلوس في الطبيعة', 'de' => 'Sitzen in der Natur']],
            ['name' => ['en' => 'Action games', 'ar' => 'العاب حركية', 'de' => 'Action-Spiele']],
            ['name' => ['en' => 'Watching movies', 'ar' => 'مشاهدة الافلام', 'de' => 'Filme anschauen']],
            ['name' => ['en' => 'Watching cartoon movies', 'ar' => 'مشاهدة الافلام الكرتون', 'de' => 'Zeichentrickfilme ansehen']],
            ['name' => ['en' => 'going out with friends', 'ar' => 'الخروج مع الاصدقاء', 'de' => 'mit Freunden ausgehen']],
            ['name' => ['en' => 'Walking', 'ar' => 'المشي', 'de' => 'Gehen']],
        ];

        foreach ($hobbies as $hobby) {
            Hobby::create($hobby);
        }
    }
}
