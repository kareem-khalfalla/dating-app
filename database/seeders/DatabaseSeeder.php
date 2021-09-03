<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            NationalitySeeder::class,
            ResidencySeeder::class,
            RelocateSeeder::class,
            LanguageSeeder::class,
            LanguagePerfectionSeeder::class,
            RelationshipSeeder::class,
            MarriageSeeder::class,
            EducationSeeder::class,
            WorkStatusSeeder::class,
            AcceptWifeWorkStatusSeeder::class,
            WifeWorkStatusSeeder::class,
            WifeStudyStatusSeeder::class,
            AcceptWifeStudyStatusSeeder::class,
            MaritalStatusSeeder::class,
            ChildrenStatusSeeder::class,
            PolygamyStatusSeeder::class,
            // WifePolygamyStatusSeeder::class,
            // PermissionSeeder::class,
            // RoleSeeder::class,
            // ShelterTypeSeeder::class,
            // ShelterShapeSeeder::class,
            // ShelterWaySeeder::class,
            // AlcoholSeeder::class,
            // AlfajrPrayerSeeder::class,
            // BeardSeeder::class,
            // BodySeeder::class,
            // EyeColorSeeder::class,
            // EyeglassSeeder::class,
            // FastingSeeder::class,
            // FoodSeeder::class,
            // HairColorSeeder::class,
            // HairKindSeeder::class,
            // HairLengthSeeder::class,
            // HalalFoodSeeder::class,
            // HeaddressSeeder::class,
            // HealthSeeder::class,
            // HobbySeeder::class,
            // MethodSeeder::class,
            // ObligationSeeder::class,
            // OverdressSeeder::class,
            // PrayerSeeder::class,
            // PsychologicalPatternSeeder::class,
            // ReadingQuranSeeder::class,
            // ReligionSeeder::class,
            // RobeSeeder::class,
            // SkinSeeder::class,
            // SmokeSeeder::class,
            // VeilSeeder::class,
        ]);
    }
}
