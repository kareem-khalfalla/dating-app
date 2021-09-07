<?php

namespace Database\Seeders;

use App\Models\RelationshipStatus;
use Illuminate\Database\Seeder;

class RelationshipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = [
            ['name' => ['en' => 'MarriageStatus', 'ar' => 'زواج', 'de' => 'Hochzeit']],
            ['name' => ['en' => 'Other', 'ar' => 'علاقه اخري', 'de' => 'andere Beziehung']],
        ];

        foreach ($relationships as $relationship) {
            RelationshipStatus::create($relationship);
        }
    }
}
