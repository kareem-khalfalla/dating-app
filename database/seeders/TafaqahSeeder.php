<?php

namespace Database\Seeders;

use App\Models\TafaqahStatus;
use Illuminate\Database\Seeder;

class TafaqahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tafaqahStatuses = [
            ['name' => ['en' => 'Know the basics', 'ar' => 'تعرف على الأساسيات', 'de' => 'Kenne die Grundlagen']],
            ['name' => ['en' => 'Read or attend lessons sometimes', 'ar' => 'اقرأ أو احضر الدروس أحيانًا', 'de' => 'Lies oder besuche manchmal Unterricht']],
            ['name' => ['en' => 'Interested in educationStatus and try it', 'ar' => 'مهتم بالتعليم وجربه', 'de' => 'Interessiert an Bildung und probiere es aus']],
            ['name' => ['en' => 'Seek knowledge', 'ar' => 'اطلب المعرفة', 'de' => 'Wissen suchen']],
        ];

        foreach ($tafaqahStatuses as $tafaqahStatus) {
            TafaqahStatus::create($tafaqahStatus);
        }
    }
}