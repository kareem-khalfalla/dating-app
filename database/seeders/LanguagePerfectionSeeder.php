<?php

namespace Database\Seeders;

use App\Models\LanguagePerfection;
use Illuminate\Database\Seeder;

class LanguagePerfectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languagePerfections = [
            ['name' => ['en' => 'High', 'ar' => 'عالي', 'de' => 'Hoch']],
            ['name' => ['en' => 'Good, I can deal with the partner', 'ar' => 'جيده يمكنني التعامل بها مع الشريك', 'de' => 'Gut, ich kann mit meinem Partner damit umgehen']],
            ['name' => ['en' => 'Bad, I can\'t deal with the partner', 'ar' => 'سيئه يمكنني التعامل بها مع الشريك', 'de' => 'Schlecht kann ich mit einem Partner umgehen']],
        ];

        foreach ($languagePerfections as $languagePerfection) {
            LanguagePerfection::create($languagePerfection);
        }
    }
}
