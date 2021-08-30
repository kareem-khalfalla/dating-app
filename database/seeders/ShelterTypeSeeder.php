<?php

namespace Database\Seeders;

use App\Models\ShelterType;
use Illuminate\Database\Seeder;

class ShelterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelterTypes = [
            ['name' => ['en' => 'mine', 'ar' => 'ملك', 'de' => 'Bergwerk']],
            ['name' => ['en' => 'rent', 'ar' => 'ايجار', 'de' => 'mieten']],
        ];

        foreach ($shelterTypes as $type) {
            ShelterType::create($type);
        }
    }
}
