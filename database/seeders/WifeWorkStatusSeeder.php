<?php

namespace Database\Seeders;

use App\Models\WifeWorkStatus;
use Illuminate\Database\Seeder;

class WifeWorkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workStatuses = [
            ['name' => ['en' => 'I have to work','ar' => 'يجب ان أعمل', 'de' => 'Ich muss arbeiten']],
            ['name' => ['en' => 'I do not accept to work','ar' => 'لا اقبل بان اعمل', 'de' => 'Ich akzeptiere die Arbeit nicht']],
            ['name' => ['en' => 'I\'d love to work if I\'m allowed','ar' => 'احب ان اعمل اذا سمح لي', 'de' => 'Ich würde gerne arbeiten, wenn ich darf']],
            ['name' => ['en' => 'I don\'t like to work unless circumstances require','ar' => 'لا احب ان اعمل الا اذا اقتضت الظروف', 'de' => 'Ich arbeite nicht gerne, es sei denn, die Umstände erfordern es']],
        ];

        foreach ($workStatuses as $workStatus) {
            WifeWorkStatus::create($workStatus);
        }
    }
}
