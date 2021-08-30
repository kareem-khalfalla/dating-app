<?php

namespace Database\Seeders;

use App\Models\PsychologicalPattern;
use Illuminate\Database\Seeder;

class PsychologicalPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $psychologicalPatterns = [
            ['name' => ['en' => 'Normal', 'ar' => 'عادي', 'de' => 'Normal']],
            ['name' => ['en' => 'Neural', 'ar' => 'عصبي', 'de' => 'Neural']],
            ['name' => ['en' => 'Romantic', 'ar' => 'رومانسي', 'de' => 'Romantisch']],
            ['name' => ['en' => 'Very sensitive', 'ar' => 'شديد الحساسية', 'de' => 'sehr empfindlich']],
            ['name' => ['en' => 'Irritable', 'ar' => 'سريع الغضب', 'de' => 'reizbar']],
            ['name' => ['en' => 'quick to get angry', 'ar' => 'سريع الزعل', 'de' => 'schnell wütend']],
            ['name' => ['en' => 'Calm', 'ar' => 'بارد الاعصاب', 'de' => 'Ruhe']],
            ['name' => ['en' => 'Suspicious', 'ar' => 'شكاك', 'de' => 'misstrauisch']],
            ['name' => ['en' => 'Curious', 'ar' => 'فضولي', 'de' => 'neugierig']],
            ['name' => ['en' => 'Sly', 'ar' => 'لقيم', 'de' => 'füttern']],
            ['name' => ['en' => 'Cheerful', 'ar' => 'مرح', 'de' => 'gut gelaunt']],
        ];

        foreach ($psychologicalPatterns as $psychologicalPattern) {
            PsychologicalPattern::create($psychologicalPattern);
        }
    }
}
