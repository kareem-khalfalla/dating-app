<?php

namespace Database\Seeders;

use App\Models\Marriage;
use Illuminate\Database\Seeder;

class MarriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marriages = [
            ['name' => ['en' => 'Engagement and then marriage', 'ar' => 'خطوبه ثم زواج', 'de' => 'Verlobung und dann Heirat']],
            ['name' => ['en' => 'A short acquaintance, then engagement, then marriage', 'ar' => 'تعارف لمده قصيره ثم خطوبه ثم زواج', 'de' => 'Kurze Bekanntschaft, dann Verlobung, dann Heirat']],
            ['name' => ['en' => 'Long time acquaintance before engagement', 'ar' => 'تعارف يتضمنه لقاء وخروج معا قبل الخطبه', 'de' => 'Eine Bekanntschaft, die vor der Verlobung ein Treffen und gemeinsames Ausgehen beinhaltet']],
            ['name' => ['en' => 'Friendship and love before engagement', 'ar' => 'صداقه وحب قبل الخطبه', 'de' => 'Freundschaft und Liebe vor der Verlobung']],
            ['name' => ['en' => 'no marriage', 'ar' => 'ﻻ زواج', 'de' => 'keine Heirat']],
        ];

        foreach ($marriages as $marriage) {
            Marriage::create($marriage);
        }
    }
}
