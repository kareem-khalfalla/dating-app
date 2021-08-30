<?php

namespace Database\Seeders;

use App\Models\Skin;
use Illuminate\Database\Seeder;

class SkinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skins = [
            ['name' => ['en' => 'White', 'ar' => 'ابيض', 'de' => 'Weiß']],
            ['name' => ['en' => 'very light', 'ar' => 'فاتح جدا', 'de' => 'sehr leicht']],
            ['name' => ['en' => 'light', 'ar' => 'فاتح', 'de' => 'hell']],
            ['name' => ['en' => 'tan', 'ar' => 'مائل الى السمره', 'de' => 'bräunen']],
            ['name' => ['en' => 'wheat', 'ar' => 'فاتح', 'de' => 'Weizen']],
            ['name' => ['en' => 'dark', 'ar' => 'فاتح', 'de' => 'dunkel']],
            ['name' => ['en' => 'very dark', 'ar' => 'فاتح', 'de' => 'sehr dunkel']],
        ];

        foreach ($skins as $skin) {
            Skin::create($skin);
        }
    }
}
