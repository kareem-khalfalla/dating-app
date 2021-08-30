<?php

namespace Database\Seeders;

use App\Models\Health;
use Illuminate\Database\Seeder;

class HealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $healths = [
            ['name' => ['en' => 'Good', 'ar' => 'جيدة', 'de' => 'gut']],
            ['name' => ['en' => 'Some persistent diseases', 'ar' => 'بعض الامراض المستديمه', 'de' => 'Einige hartnäckige Krankheiten']],
            ['name' => ['en' => 'Partial handicap', 'ar' => 'اعاقه جزئيه', 'de' => 'teilweise Behinderung']],
        ];

        foreach ($healths as $health) {
            Health::create($health);
        }
    }
}
