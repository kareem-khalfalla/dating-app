<?php

namespace Database\Seeders;

use App\Models\HairLength;
use Illuminate\Database\Seeder;

class HairLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allHairLength = [
            ['name' => ['en' => 'Hairless', 'ar' => 'اصلع', 'de' => 'kahl']],
            ['name' => ['en' => 'Shaved', 'ar' => 'محلوق', 'de' => 'rasiert']],
            ['name' => ['en' => 'Short', 'ar' => 'قصير', 'de' => 'Kurz']],
            ['name' => ['en' => 'a little tall', 'ar' => 'طويل قليلا', 'de' => 'ein bisschen groß']],
            ['name' => ['en' => 'Long', 'ar' => 'طويل', 'de' => 'Lang']],
            ['name' => ['en' => 'Very long', 'ar' => 'طويل جدا', 'de' => 'Sehr lang']],
        ];

        foreach ($allHairLength as $hairLength) {
            HairLength::create($hairLength);
        }
    }
}
