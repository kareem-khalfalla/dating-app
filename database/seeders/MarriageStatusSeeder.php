<?php

namespace Database\Seeders;

use App\Models\MarriageStatus;
use Illuminate\Database\Seeder;

class MarriageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marriageStatuses = [
            ['name' => ['en' => 'Engagement and then marriageStatus', 'ar' => 'خطوبه ثم زواج', 'de' => 'Verlobung und dann Heirat']],
            ['name' => ['en' => 'A short acquaintance, then engagement, then marriageStatus', 'ar' => 'تعارف لمده قصيره ثم خطوبه ثم زواج', 'de' => 'Kurze Bekanntschaft, dann Verlobung, dann Heirat']],
            ['name' => ['en' => 'Long time acquaintance before engagement', 'ar' => 'تعارف يتضمنه لقاء وخروج معا قبل الخطبه', 'de' => 'Eine Bekanntschaft, die vor der Verlobung ein Treffen und gemeinsames Ausgehen beinhaltet']],
            ['name' => ['en' => 'Friendship and love before engagement', 'ar' => 'صداقه وحب قبل الخطبه', 'de' => 'Freundschaft und Liebe vor der Verlobung']],
            ['name' => ['en' => 'no marriageStatus', 'ar' => 'ﻻ زواج', 'de' => 'keine Heirat']],
        ];

        foreach ($marriageStatuses as $marriageStatus) {
            MarriageStatus::create($marriageStatus);
        }
    }
}
