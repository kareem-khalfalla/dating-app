<?php

namespace Database\Seeders;

use App\Models\Body;
use Illuminate\Database\Seeder;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodies = [
            ['name' => ['en' => 'Harmonic', 'ar' => '‫متناسق‬', 'de' => 'harmonisch']],
            ['name' => ['en' => 'Athlete', 'ar' => 'رياضي', 'de' => 'Athlet']],
            ['name' => ['en' => 'prone to obesity', 'ar' => 'مائل الى السمنه', 'de' => 'übergewichtig']],
            ['name' => ['en' => 'leaning towards thinness', 'ar' => 'مائل الى النحاله', 'de' => 'geneigt zur Biene']],
            ['name' => ['en' => 'a bit fat', 'ar' => 'سمين نوعا ما', 'de' => 'ein bisschen Fett']],
            ['name' => ['en' => 'Weak', 'ar' => 'ضعيف', 'de' => 'schwach']],
            ['name' => ['en' => 'Graceful', 'ar' => 'رشيق', 'de' => 'anmutig']],
        ];

        foreach ($bodies as $body) {
            Body::create($body);
        }
    }
}
