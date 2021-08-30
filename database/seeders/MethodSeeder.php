<?php

namespace Database\Seeders;

use App\Models\Method;
use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name' => ['en' => 'feel', 'ar' => 'اشعري', 'de' => 'Gefühl']],
            ['name' => ['en' => 'my predecessor', 'ar' => 'سلفي', 'de' => 'mein Vorgänger']],
            ['name' => ['en' => 'Dismissal of the Sunnah', 'ar' => 'منكر للسنة', 'de' => 'Entlassung der Sunnah']],
            ['name' => ['en' => 'Sufi Munkar', 'ar' => 'منكر صوفي', 'de' => 'Sufi Munkar']],
            ['name' => ['en' => 'Zedy', 'ar' => 'زيدي', 'de' => 'Zedy']],
            ['name' => ['en' => 'Jaafari', 'ar' => 'جعفري', 'de' => 'Jaafari']],
            ['name' => ['en' => 'Matrade', 'ar' => 'ماتريدي', 'de' => 'Matrade']],
            ['name' => ['en' => 'Abadi', 'ar' => 'اباضي', 'de' => 'Abadi']],
            ['name' => ['en' => 'my income', 'ar' => 'كدخلي', 'de' => 'mein Einkommen']],
            ['name' => ['en' => 'my brothers', 'ar' => 'اخواني', 'de' => 'meine Brüder']],
            ['name' => ['en' => 'Ethiopian', 'ar' => 'حبشي', 'de' => 'Äthiopisch']],
            ['name' => ['en' => 'Protestant', 'ar' => 'بروتستانت', 'de' => 'Evangelisch']],
            ['name' => ['en' => 'Catholic', 'ar' => 'كاثوليك', 'de' => 'Katholisch']],
            ['name' => ['en' => 'Autodox', 'ar' => 'اوثودوكس', 'de' => 'Autodox']],
            ['name' => ['en' => 'I don\'t know', 'ar' => 'ﻻ اعلم', 'de' => 'Ich weiß nicht']],
            ['name' => ['en' => 'other', 'ar' => 'اخري', 'de' => 'Sonstiges']],
        ];

        foreach ($methods as $method) {
            Method::create($method);
        }
    }
}
