<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [
            ['name' => ['en' => 'born Muslim', 'ar' => 'مولود مسلم', 'de' => 'geborener Muslim']],
            ['name' => ['en' => 'converted to Islam', 'ar' => 'متحول الى الاسلام', 'de' => 'zum Islam übergetreten']],
            ['name' => ['en' => 'I intend to convert to Islam', 'ar' => 'انوي التحول الي الاسلام', 'de' => 'Ich beabsichtige, zum Islam zu konvertieren']],
            ['name' => ['en' => 'Druze', 'ar' => 'درزي', 'de' => 'Druse']],
            ['name' => ['en' => 'upper', 'ar' => 'علوي', 'de' => 'Oberer, höher']],
            ['name' => ['en' => 'Yazidi', 'ar' => 'يزيدي', 'de' => 'Jeziden']],
            ['name' => ['en' => 'Qadiani', 'ar' => 'قادياني', 'de' => 'Qadiani']],
            ['name' => ['en' => 'atheist', 'ar' => 'ملحد', 'de' => 'Atheist']],
            ['name' => ['en' => 'Christian', 'ar' => 'نصراني', 'de' => 'Christian']],
        ];

        foreach ($religions as $religion) {
            Religion::create($religion);
        }
    }
}
