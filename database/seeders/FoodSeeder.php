<?php

namespace Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food_types = [
            ['name' => ['en' => 'Arabic', 'ar' => 'عربي', 'de' => 'Arabisch']],
            ['name' => ['en' => 'Western', 'ar' => 'غربي', 'de' => 'Western']],
            ['name' => ['en' => 'Asian', 'ar' => 'اسيوي', 'de' => 'asiatisch']],
            ['name' => ['en' => 'Fastfood', 'ar' => 'وجبات سريعه', 'de' => 'Fastfood']],
            ['name' => ['en' => 'Hearty meals', 'ar' => 'وجبات دسمه', 'de' => 'deftige Mahlzeiten']],
        ];

        foreach ($food_types as $food) {
            FoodType::create($food);
        }
    }
}
