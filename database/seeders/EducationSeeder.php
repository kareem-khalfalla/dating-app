<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            ['name' => ['en' => 'Doctorate', 'ar' => 'دكتوراه', 'de' => 'Doctorate']],
            ['name' => ['en' => 'Master', 'ar' => 'ماجستير', 'de' => 'Master']],
            ['name' => ['en' => 'Bachelor', 'ar' => 'بكالوريوس', 'de' => 'Bachelor']],
            ['name' => ['en' => 'Institut', 'ar' => 'معهد', 'de' => 'Institut']],
            ['name' => ['en' => 'Secondary', 'ar' => 'ثانوي', 'de' => 'sekundär']],
            ['name' => ['en' => 'Junior', 'ar' => 'الاعداديه', 'de' => 'Junior']],
            ['name' => ['en' => 'Other', 'ar' => 'غير ذالك', 'de' => 'Sonstiges']],
        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
