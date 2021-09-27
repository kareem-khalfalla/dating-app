<?php

namespace Database\Factories;

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
use App\Models\MaritalStatus;
use App\Models\MarriageStatus;
use App\Models\MusicStatus;
use App\Models\ReligionMethod;
use App\Models\Nationality;
use App\Models\Obligation;
use App\Models\Overdress;
use App\Models\PolygamyStatus;
use App\Models\Prayer;
use App\Models\Profile;
use App\Models\PsychologicalPattern;
use App\Models\ReadingQuran;
use App\Models\RelationshipStatus;
use App\Models\Religion;
use App\Models\RelocateStatus;
use App\Models\ResidenceStatus;
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
use App\Models\WifePolygamyStatus;
use App\Models\WifeStudyStatus;
use App\Models\WifeWorkStatus;
use App\Models\WorkStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('fake', 1)->doesntHave('profile')->first()->id,
            'education_status_id' => EducationStatus::all()->random()->id,
            'work_status_id' => WorkStatus::all()->random()->id,
            'marriage_status_id' => MarriageStatus::all()->random()->id,
            'female_work_status_id' => WifeWorkStatus::all()->random()->id,
            'female_polygamy_status_id' => WifePolygamyStatus::all()->random()->id,
            'female_study_status_id' => WifeStudyStatus::all()->random()->id,
            'male_work_status_id' => AcceptWifeWorkStatus::all()->random()->id,
            'male_study_status_id' => AcceptWifeStudyStatus::all()->random()->id,
            'nationality_id' => Nationality::all()->random()->id,
            'residence_status_id' => ResidenceStatus::all()->random()->id,
            'relocate_status_id' => RelocateStatus::all()->random()->id,
            'relationship_status_id' => RelationshipStatus::all()->random()->id,
            'body_status_id' => BodyStatus::all()->random()->id,
            'skin_status_id' => SkinStatus::all()->random()->id,
            'hair_color_id' => HairColor::all()->random()->id,
            'hair_length_id' => HairLength::all()->random()->id,
            'hair_kind_id' => HairKind::all()->random()->id,
            'eye_color_id' => EyeColor::all()->random()->id,
            'eye_glass_id' => EyeGlass::all()->random()->id,
            'health_status_id' => HealthStatus::all()->random()->id,
            'psychological_pattern_id' => PsychologicalPattern::all()->random()->id,
            'shelter_type_id' => ShelterType::all()->random()->id,
            'shelter_shape_id' => ShelterShape::all()->random()->id,
            'shelter_way_id' => ShelterWay::all()->random()->id,
            'marital_status_id' => MaritalStatus::all()->random()->id,
            'male_polygamy_status_id' => PolygamyStatus::all()->random()->id,
            'children_status_id' => ChildrenStatus::all()->random()->id,
            'children_desire_status_id' => ChildrenDesireStatus::all()->random()->id,
            'smoke_status_id' => SmokeStatus::all()->random()->id,
            'alcohol_status_id' => AlcoholStatus::all()->random()->id,
            'halal_food_status_id' => HalalFoodStatus::all()->random()->id,
            'food_type_id' => FoodType::all()->random()->id,
            'religion_id' => Religion::all()->random()->id,
            'religion_method_id' => ReligionMethod::all()->random()->id,
            'obligation_id' => Obligation::all()->random()->id,
            'prayer_id' => Prayer::all()->random()->id,
            'alfajr_prayer_id' => AlfajrPrayer::all()->random()->id,
            'headdress_id' => Headdress::all()->random()->id,
            'fasting_id' => Fasting::all()->random()->id,
            'reading_quran_id' => ReadingQuran::all()->random()->id,
            'robe_status_id' => RobeStatus::all()->random()->id,
            'veil_status_id' => VeilStatus::all()->random()->id,
            'overdress_id' => Overdress::all()->random()->id,
            'beard_status_id' => BeardStatus::all()->random()->id,
            'tafaqah_status_id' => TafaqahStatus::all()->random()->id,
            'music_status_id' => MusicStatus::all()->random()->id,
            'friend_status_id' => FriendStatus::all()->random()->id,
            'show_status_id' => ShowStatus::all()->random()->id,
            'hometown_id' => Country::all()->random()->id,
            'country_of_residence_id' => Country::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'children_count' => random_int(0, 9),
            'postal_code' => $this->faker->postcode(),
            'progress_bar' => '',
            'specialization' => $this->faker->jobTitle(),
            'books' => implode(', ', $this->faker->words()),
            'places' => implode(', ', $this->faker->words()),
            'interests' => implode(', ', $this->faker->words()),
            'height' => $this->faker->randomFloat(2, 155, 200),
            'weight' => $this->faker->randomFloat(2, 66, 110),
            'income' => $this->faker->randomFloat(2, 1555, 8500),
            'dob' => $this->faker->dateTimeBetween('-50 years'),
            'bio' => $this->faker->paragraph(),
            'partner_bio' => $this->faker->paragraph(),
            'competence' => $this->faker->paragraph(),
            'children_information' => $this->faker->paragraph(),
            'divorced_reason' => $this->faker->paragraph(),
            'clarification' => $this->faker->paragraph(),
            'lesson_listing' => implode(', ', $this->faker->words()),
        ];
    }
}
