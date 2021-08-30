<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maritalStatus = [
            ['name' => ['en' => 'Single', 'ar' => 'أعزب', 'de' => 'Unverheiratet']],
            ['name' => ['en' => 'Married', 'ar' => 'متزوج', 'de' => 'Verheiratet']],
            ['name' => ['en' => 'Widower', 'ar' => 'أعزب', 'de' => 'Witwer']],
            ['name' => ['en' => 'divorced', 'ar' => 'مطلق', 'de' => 'geschieden']],
        ];

        foreach ($maritalStatus as $m) {
            MaritalStatus::create($m);
        }
    }
}
