<?php

namespace Database\Seeders;

use App\Models\HairKind;
use Illuminate\Database\Seeder;

class HairKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hairKinds = [
            ['name' => ['en' => 'Smooth', 'ar' => 'املس', 'de' => 'glatt']],
            ['name' => ['en' => 'Crispy', 'ar' => 'متموج', 'de' => 'knusprig']],
            ['name' => ['en' => 'Slightly curly', 'ar' => 'مجعد قليلا', 'de' => 'leicht lockig']],
            ['name' => ['en' => 'Very curly', 'ar' => 'مجعد كثيرا', 'de' => 'sehr lockig']],
            ['name' => ['en' => 'Other', 'ar' => 'اخري', 'de' => 'Sonstiges']],
        ];

        foreach ($hairKinds as $hairKind) {
            HairKind::create($hairKind);
        }
    }
}
