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
            WifePolygamyStatusSeeder::class,
            ChildrenDesireStatusSeeder::class,
            ShelterTypeSeeder::class,
            ShelterShapeSeeder::class,
            ShelterWaySeeder::class,
            ReligionSeeder::class,
            MethodSeeder::class,
            ObligationSeeder::class,
            PrayerSeeder::class,
            AlfajrPrayerSeeder::class,
            FastingSeeder::class,
            ReadingQuranSeeder::class,
            HeaddressSeeder::class,
            VeilSeeder::class,
            RobeSeeder::class,
            BeardSeeder::class,
            TafaqahSeeder::class,
            MusicStatusSeeder::class,
            ShowStatusSeeder::class,
            FriendStatusSeeder::class,
            BodySeeder::class,
            SkinSeeder::class,
            HairColorSeeder::class,
            HairLengthSeeder::class,
            HairKindSeeder::class,
            EyeColorSeeder::class,
            EyeglassSeeder::class,
            HealthSeeder::class,
            PsychologicalPatternSeeder::class,
            // RoleSeeder::class,
            // AlcoholSeeder::class,
            // FoodSeeder::class,
            // HalalFoodSeeder::class,
            // HobbySeeder::class,
            // OverdressSeeder::class,
            // SmokeSeeder::class,
        ]);
    }
}
