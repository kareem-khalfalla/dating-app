<?php

namespace Database\Seeders;

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
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            NationalitySeeder::class,
            ResidenceStatusSeeder::class,
            RelocateStatusSeeder::class,
            LanguageSeeder::class,
            LanguagePerfectionStatusSeeder::class,
            RelationshipStatusSeeder::class,
            MarriageStatusSeeder::class,
            EducationStatusSeeder::class,
            WorkStatusSeeder::class,
            AcceptWifeWorkStatusSeeder::class,
            WifeWorkStatusSeeder::class,
            WifeStudyStatusSeeder::class,
            AcceptWifeStudyStatusSeeder::class,
            MaritalStatusSeeder::class,
            ChildrenStatusSeeder::class,
            PolygamyStatusSeeder::class,
            WifePolygamyStatusSeeder::class,
            ChildrenDesireStatusSeeder::class,
            ShelterTypeSeeder::class,
            ShelterShapeSeeder::class,
            ShelterWaySeeder::class,
            ReligionSeeder::class,
            ReligionMethodSeeder::class,
            ObligationSeeder::class,
            PrayerSeeder::class,
            AlfajrPrayerSeeder::class,
            FastingSeeder::class,
            ReadingQuranSeeder::class,
            HeaddressSeeder::class,
            VeilStatusSeeder::class,
            RobeStatusSeeder::class,
            BeardSeeder::class,
            TafaqahSeeder::class,
            MusicStatusSeeder::class,
            ShowStatusSeeder::class,
            FriendStatusSeeder::class,
            BodyStatusSeeder::class,
            SkinStatusSeeder::class,
            HairColorSeeder::class,
            HairLengthSeeder::class,
            HairKindSeeder::class,
            EyeColorSeeder::class,
            EyeGlassSeeder::class,
            HealthStatusSeeder::class,
            PsychologicalPatternSeeder::class,
            SmokeSeeder::class,
            AlcoholStatusSeeder::class,
            HalalFoodStatusSeeder::class,
            FoodSeeder::class,
            HobbySeeder::class,
            OverdressSeeder::class,
            // UserSeeder::class,
            // RoleSeeder::class,
        ]);
    }
}
