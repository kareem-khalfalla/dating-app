<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [
            ['name' => ['en' => 'Atheists', 'ar' => 'الملحدين', 'de' => 'Atheisten']],
            ['name' => ['en' => 'Agnostics', 'ar' => 'ملحدون', 'de' => 'Atheisten']],
            ['name' => ['en' => 'Bahais', 'ar' => 'البهائيين', 'de' => 'Bahai']],
            ['name' => ['en' => 'Buddhists', 'ar' => 'البوذيون', 'de' => 'Buddhisten']],
            ['name' => ['en' => 'Chinese folk-religionists', 'ar' => 'الدينيون الشعبيون الصينيون', 'de' => 'Chinesische Volksreligionen']],
            ['name' => ['en' => 'Christians', 'ar' => 'مسيحيون', 'de' => 'Christen']],
            ['name' => ['en' => 'Confucianists', 'ar' => 'الكونفوشيوسية', 'de' => 'Konfuzianismus']],
            ['name' => ['en' => 'Daoists', 'ar' => 'الطاوية', 'de' => 'Taoismus']],
            ['name' => ['en' => 'Ethnoreligionists', 'ar' => 'أتنوريليجين', 'de' => 'ANORILEGEN']],
            ['name' => ['en' => 'Hindus', 'ar' => 'الهندوس', 'de' => 'Hindus']],
            ['name' => ['en' => 'Jains', 'ar' => 'جاينز', 'de' => 'Jains']],
            ['name' => ['en' => 'Jews', 'ar' => 'يهود', 'de' => 'jüdisch']],
            ['name' => ['en' => 'Muslims', 'ar' => 'المسلمون', 'de' => 'Muslime']],
            ['name' => ['en' => 'New Religionists', 'ar' => 'المتدينون الجدد', 'de' => 'Die neue Ordensfrau']],
            ['name' => ['en' => 'Shintoists', 'ar' => 'الشنتويون', 'de' => 'Shintoon']],
            ['name' => ['en' => 'Sikhs', 'ar' => 'السيخ', 'de' => 'Sikh']],
            ['name' => ['en' => 'Spiritists', 'ar' => 'الأرواح', 'de' => 'Spirituosen']],
            ['name' => ['en' => 'Zoroastrians', 'ar' => 'الزرادشتيون', 'de' => 'Zoroastrier']],
        ];

        foreach ($religions as $religion) {
            Religion::create($religion);
        }
    }
}