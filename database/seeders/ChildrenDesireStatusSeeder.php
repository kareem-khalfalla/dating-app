<?php

namespace Database\Seeders;

use App\Models\ChildrenDesireStatus;
use Illuminate\Database\Seeder;

class ChildrenDesireStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $childrenDesireStatuses = [
            ['name' => ['en' => 'I would like it I would like it', 'ar' => 'أود ذلك أود ذلك', 'de' => 'Ich möchte es Ich möchte es']],
            ['name' => ['en' => 'I do not want it I do not want it', 'ar' => 'لا اريدها لا اريدها', 'de' => 'ich will es nicht ich will es nicht']],
            ['name' => ['en' => 'Yes but not now Yes but not now', 'ar' => 'نعم ولكن ليس الآن نعم ولكن ليس الآن', 'de' => 'Ja, aber nicht jetzt Ja, aber nicht jetzt']],
            ['name' => ['en' => 'According to the desire of the other party According to the desire of the other party', 'ar' => 'حسب رغبة الطرف الآخر حسب رغبة الطرف الآخر', 'de' => 'Nach dem Wunsch der anderen Partei Nach dem Wunsch der anderen Partei']],
        ];

        foreach ($childrenDesireStatuses as $childrenDesireStatus) {
            ChildrenDesireStatus::create($childrenDesireStatus);
        }
    }
}
