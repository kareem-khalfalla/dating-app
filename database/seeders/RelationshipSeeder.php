<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = [
            ['name' => ['en' => 'Marriage', 'ar' => 'زواج', 'de' => 'Hochzeit']],
            ['name' => ['en' => 'Other', 'ar' => 'علاقه اخري', 'de' => 'andere Beziehung']],
        ];

        foreach ($relationships as $relationship) {
            Relationship::create($relationship);
        }
    }
}
