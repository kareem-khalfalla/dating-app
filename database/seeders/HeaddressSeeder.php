<?php

namespace Database\Seeders;

use App\Models\Headdress;
use Illuminate\Database\Seeder;

class HeaddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headdresses = [
            ['name' => ['en' => 'Yes', 'ar' => 'نعم', 'de' => 'Jawohl']],
            ['name' => ['en' => 'No', 'ar' => 'ﻵ', 'de' => 'Nein']],
            ['name' => ['en' => 'With his trait', 'ar' => 'مع اظهار خصله', 'de' => 'Mit seiner Eigenschaft']],
        ];

        foreach ($headdresses as $headdress) {
            Headdress::create($headdress);
        }
    }
}
