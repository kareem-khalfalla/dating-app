<?php

namespace Database\Seeders;

use App\Models\AcceptWifeStudyStatus;
use App\Models\AcceptWifeWorkStatus;
use App\Models\AlcoholStatus;
use App\Models\AlfajrPrayer;
use App\Models\BeardStatus;
use App\Models\BodyStatus;
use App\Models\ChildrenDesireStatus;
use App\Models\ChildrenStatus;
use App\Models\Country;
use App\Models\EducationStatus;
use App\Models\EyeColor;
use App\Models\EyeGlass;
use App\Models\Fasting;
use App\Models\FoodType;
use App\Models\FriendStatus;
use App\Models\HairColor;
use App\Models\HairKind;
use App\Models\HairLength;
use App\Models\HalalFoodStatus;
use App\Models\Headdress;
use App\Models\HealthStatus;
use App\Models\Language;
use App\Models\LanguagePerfectionStatus;
use App\Models\MaritalStatus;
use App\Models\MarriageStatus;
use App\Models\MusicStatus;
use App\Models\Nationality;
use App\Models\Obligation;
use App\Models\PolygamyStatus;
use App\Models\Prayer;
use App\Models\PsychologicalPattern;
use App\Models\ReadingQuran;
use App\Models\RelationshipStatus;
use App\Models\Religion;
use App\Models\ReligionMethod;
use App\Models\RelocateStatus;
use App\Models\ResidencyStatus;
use App\Models\RobeStatus;
use App\Models\ShelterShape;
use App\Models\ShelterType;
use App\Models\ShelterWay;
use App\Models\ShowStatus;
use App\Models\SkinStatus;
use App\Models\SmokeStatus;
use App\Models\State;
use App\Models\TafaqahStatus;
use App\Models\User;
use App\Models\VeilStatus;
use App\Models\WifeStudyStatus;
use App\Models\WifeWorkStatus;
use App\Models\WorkStatus;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $hometown = Country::all()->random();
        $residence = Country::all()->random();
        $languageNative = Language::all()->random();
        $languageSecond = Language::all()->random();
        $languageThird = Language::all()->random();
        $languagePerfectionStatus = LanguagePerfectionStatus::all()->random();
        $languageNative->update([
            'language_perfection_status_id' => $languagePerfectionStatus->id
        ]);
        $languageSecond->update([
            'language_perfection_status_id' => $languagePerfectionStatus->id,
            'order' => 2
        ]);
        $languageThird->update([
            'language_perfection_status_id' => $languagePerfectionStatus->id,
            'order' => 3
        ]);

        /** @var \App\Models\Profile $adminUserProfile */
        $adminUserProfile = $user->profile()->create();
        $adminUserProfile->languages()->attach($languageNative);
        $adminUserProfile->languages()->attach($languageSecond);
        $adminUserProfile->languages()->attach($languageThird);
        $adminUserProfile->countries()->attach($hometown);
        $adminUserProfile->countries()->attach($residence);
        $adminUserProfile->countries->find($residence->id)->pivot->is_hometown = 0;
        $adminUserProfile->countries->find($residence->id)->pivot->save();
        $adminUserProfile->education_status_id = EducationStatus::all()->random()->id;
        $adminUserProfile->work_status_id = WorkStatus::all()->random()->id;
        $adminUserProfile->marriage_status_id = MarriageStatus::all()->random()->id;
        $adminUserProfile->wife_work_status_id = WifeWorkStatus::all()->random()->id;
        $adminUserProfile->wife_study_status_id = WifeStudyStatus::all()->random()->id;
        $adminUserProfile->accept_wife_work_status_id = AcceptWifeWorkStatus::all()->random()->id;
        $adminUserProfile->accept_wife_study_status_id = AcceptWifeStudyStatus::all()->random()->id;
        $adminUserProfile->nationality_id = Nationality::all()->random()->id;
        $adminUserProfile->residency_status_id = ResidencyStatus::all()->random()->id;
        $adminUserProfile->relocate_status_id = RelocateStatus::all()->random()->id;
        $adminUserProfile->relationship_status_id = RelationshipStatus::all()->random()->id;
        $adminUserProfile->state_id = State::all()->random()->id;
        $adminUserProfile->specialization = 'Computers';
        $adminUserProfile->income = rand(999, 9999);
        $adminUserProfile->bio = 'Lorem ipsum dolor sit amet consectetur.';
        $adminUserProfile->partner_bio = 'Lorem, ipsum dolor sit amet consectetur adipisicing.';
        $adminUserProfile->competence = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.';
        $adminUserProfile->dob = '1995-01-14';
        $adminUserProfile->postal_code = '123-45';
        $adminUserProfile->progress_bar = '99.99';
        $adminUserProfile->shelter_type_id = ShelterType::all()->random()->id;
        $adminUserProfile->shelter_shape_id = ShelterShape::all()->random()->id;
        $adminUserProfile->shelter_way_id = ShelterWay::all()->random()->id;
        $adminUserProfile->smoke_status_id = SmokeStatus::all()->random()->id;
        $adminUserProfile->alcohol_status_id = AlcoholStatus::all()->random()->id;
        $adminUserProfile->halal_food_status_id = HalalFoodStatus::all()->random()->id;
        $adminUserProfile->food_type_id = FoodType::all()->random()->id;
        $adminUserProfile->books = 'Lorem ipsum, dolor sit amet consectetur adipisicing.';
        $adminUserProfile->places = 'Lorem ipsum dolor sit amet consectetur.';
        $adminUserProfile->interests = 'Lorem ipsum dolor sit amet.';
        $adminUserProfile->body_status_id = BodyStatus::all()->random()->id;
        $adminUserProfile->skin_status_id = SkinStatus::all()->random()->id;
        $adminUserProfile->hair_color_id = HairColor::all()->random()->id;
        $adminUserProfile->hair_length_id = HairLength::all()->random()->id;
        $adminUserProfile->hair_kind_id = HairKind::all()->random()->id;
        $adminUserProfile->eye_color_id = EyeColor::all()->random()->id;
        $adminUserProfile->eye_glass_id = EyeGlass::all()->random()->id;
        $adminUserProfile->health_status_id = HealthStatus::all()->random()->id;
        $adminUserProfile->psychological_pattern_id = PsychologicalPattern::all()->random()->id;
        $adminUserProfile->height = rand(150, 200);
        $adminUserProfile->weight = rand(50, 150);
        $adminUserProfile->clarification = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, ipsam?';
        $adminUserProfile->marital_status_id = MaritalStatus::all()->random()->id;
        $adminUserProfile->polygamy_status_id = PolygamyStatus::all()->random()->id;
        $adminUserProfile->shelter_type_id = ShelterType::all()->random()->id;
        $adminUserProfile->shelter_shape_id = ShelterShape::all()->random()->id;
        $adminUserProfile->shelter_way_id = ShelterWay::all()->random()->id;
        $adminUserProfile->children_count = rand(1, 9);
        $adminUserProfile->children_status_id = ChildrenStatus::all()->random()->id;
        $adminUserProfile->children_information = 'Lorem ipsum dolor sit.';
        $adminUserProfile->children_desire_status_id = ChildrenDesireStatus::all()->random()->id;
        $adminUserProfile->divorced_reason = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima error iste cumque omnis iure. Ratione!';
        $adminUserProfile->religion_id = Religion::all()->random()->id;
        $adminUserProfile->religion_method_id = ReligionMethod::all()->random()->id;
        $adminUserProfile->obligation_id = Obligation::all()->random()->id;
        $adminUserProfile->prayer_id = Prayer::all()->random()->id;
        $adminUserProfile->alfajr_prayer_id = AlfajrPrayer::all()->random()->id;
        $adminUserProfile->headdress_id = Headdress::all()->random()->id;
        $adminUserProfile->fasting_id = Fasting::all()->random()->id;
        $adminUserProfile->reading_quran_id = ReadingQuran::all()->random()->id;
        $adminUserProfile->robe_status_id = RobeStatus::all()->random()->id;
        $adminUserProfile->veil_status_id = VeilStatus::all()->random()->id;
        // $adminUserProfile->overdress_id = adminUserProf::all()->random()->id;
        $adminUserProfile->beard_status_id = BeardStatus::all()->random()->id;
        $adminUserProfile->tafaqah_status_id = TafaqahStatus::all()->random()->id;
        $adminUserProfile->music_status_id = MusicStatus::all()->random()->id;
        $adminUserProfile->friend_status_id = FriendStatus::all()->random()->id;
        $adminUserProfile->show_status_id = ShowStatus::all()->random()->id;
        $adminUserProfile->lesson_listing = 'Lorem ipsum dolor sit amet.';
        $adminUserProfile->save();
    }
}
