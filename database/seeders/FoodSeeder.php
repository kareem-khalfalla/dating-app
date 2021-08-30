<?php

namespace Database\Seeders;

use App\Models\Food;
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
        $foods = [
            ['name' => ['en' => 'Arabic', 'ar' => 'عربي', 'de' => 'Arabisch']],
            ['name' => ['en' => 'Western', 'ar' => 'غربي', 'de' => 'Western']],
            ['name' => ['en' => 'Asian', 'ar' => 'اسيوي', 'de' => 'asiatisch']],
            ['name' => ['en' => 'Fastfood', 'ar' => 'وجبات سريعه', 'de' => 'Fastfood']],
            ['name' => ['en' => 'Hearty meals', 'ar' => 'وجبات دسمه', 'de' => 'deftige Mahlzeiten']],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
