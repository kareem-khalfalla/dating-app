<?php

namespace Database\Seeders;

use App\Models\HairColor;
use Illuminate\Database\Seeder;

class HairColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hairColors = [
            ['name' => ['en' => 'Black', 'ar' => 'اسود', 'de' => 'Schwarz']],
            ['name' => ['en' => 'Brown', 'ar' => 'بني', 'de' => 'braun']],
            ['name' => ['en' => 'Light brown', 'ar' => 'بني فاتح', 'de' => 'Hellbraun']],
            ['name' => ['en' => 'Blonde', 'ar' => 'اشقر', 'de' => 'blond']],
            ['name' => ['en' => 'White', 'ar' => 'ابيض', 'de' => 'Weiß']],
            ['name' => ['en' => 'Red', 'ar' => 'احمر', 'de' => 'rot']],
        ];

        foreach ($hairColors as $hairColor) {
            HairColor::create($hairColor);
        }
    }
}
