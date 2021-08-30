<?php

namespace Database\Seeders;

use App\Models\Obligation;
use Illuminate\Database\Seeder;

class ObligationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obligations = [
            ['name' => ['en' => 'committed', 'ar' => 'ملتزم', 'de' => 'engagiert']],
            ['name' => ['en' => 'Uncommitted', 'ar' => 'غير ملتزم', 'de' => 'Ungebunden']],
            ['name' => ['en' => 'sometimes obligated', 'ar' => 'ملتزم احيانا', 'de' => 'manchmal verpflichtet']],
            ['name' => ['en' => 'Not interested', 'ar' => 'غير مهتم', 'de' => 'Nicht interessiert']],
        ];

        foreach ($obligations as $obligation) {
            Obligation::create($obligation);
        }
    }
}
