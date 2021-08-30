<?php

namespace Database\Seeders;

use App\Models\AlfajrPrayer;
use Illuminate\Database\Seeder;

class AlfajrPrayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allAlFajrPrayer = [
            ['name' => ['en' => 'committed to', 'ar' => 'ملتزم بها', 'de' => 'verpflichtet']],
            ['name' => ['en' => 'not committed to', 'ar' => 'غير ملتزم بها', 'de' => 'nicht dazu verpflichtet']],
            ['name' => ['en' => 'sometimes', 'ar' => 'احيانا', 'de' => 'Manchmal']],
        ];

        foreach ($allAlFajrPrayer as $alfajrPrayer) {
            AlfajrPrayer::create($alfajrPrayer);
        }
    }
}
