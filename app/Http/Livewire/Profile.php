<?php

namespace App\Http\Livewire;

use App\Models\AcceptWifeStudyStatus;
use App\Models\AcceptWifeWorkStatus;
use App\Models\Alcohol;
use App\Models\AlfajrPrayer;
use App\Models\Beard;
use App\Models\Body;
use App\Models\ChildrenDesireStatus;
use App\Models\ChildrenStatus;
use App\Models\Country;
use App\Models\Education;
use App\Models\EyeColor;
use App\Models\EyeGlass;
use App\Models\Fasting;
use App\Models\Food;
use App\Models\FriendStatus;
use App\Models\HairColor;
use App\Models\HairKind;
use App\Models\HairLength;
use App\Models\HalalFood;
use App\Models\Headdress;
use App\Models\Health;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\LanguagePerfection;
use App\Models\MaritalStatus;
use App\Models\Marriage;
use App\Models\Method;
use App\Models\MusicStatus;
use App\Models\Nationality;
use App\Models\Obligation;
use App\Models\PolygamyStatus;
use App\Models\Prayer;
use App\Models\PsychologicalPattern;
use App\Models\ReadingQuran;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Relocate;
use App\Models\Residency;
use App\Models\Robe;
use App\Models\ShelterShape;
use App\Models\ShelterType;
use App\Models\ShelterWay;
use App\Models\ShowStatus;
use App\Models\Skin;
use App\Models\Smoke;
use App\Models\State;
use App\Models\Tafaqah;
use App\Models\Veil;
use App\Models\WifePolygamyStatus;
use App\Models\WifeStudyStatus;
use App\Models\WifeWorkStatus;
use App\Models\WorkStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    protected $listeners = [
        // 
    ];

    public $state = [];

    public $nationalities;
    public $residencies;
    public $relocations;
    public $languages;
    public $languagePerfections;
    public $educations;
    public $relationships;
    public $marriages;
    public $workStatuses;
    public $friendStatuses;
    public $acceptWifeWorkStatuses;
    public $acceptWifeStudyStatuses;
    public $wifeWorkStatuses;
    public $wifeStudyStatuses;
    public $maritalStatuses;
    public $childrenStatuses;
    public $childrenDesireStatuses;
    public $polygamyStatuses;
    public $wifePolygamyStatuses;
    public $shelterTypes;
    public $shelterShapes;
    public $shelterWays;
    public $fastings;
    public $tafaqahs;
    public $religions;
    public $obligations;
    public $methods;
    public $prayers;
    public $alfajrPrayers;
    public $readingQurans;
    public $headdresses;
    public $veils;
    public $robes;
    public $beards;
    public $musicStatuses;
    public $showStatuses;
    public $countries;
    public $selectedCountry;
    public $countryStates;
    public $selectedState;
    public $bodies;
    public $smokes;
    public $alcohols;
    public $halalFoods;
    public $foods;
    public $hobbies;
    public $skins;
    public $hairColors;
    public $hairLengths;
    public $hairKinds;
    public $eyeColors;
    public $eyeGlasses;
    public $healths;
    public $psychologicalPatterns;

    public $successMessage = '';

    public $image;
    public $imageName;

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $this->state = $user->only([
            'name', 'email', 'username', 'phone'
        ]);

        $this->imageName = auth()->user()->profile->image->url ?? '';

        $this->religions = Religion::all();
        $this->obligations = Obligation::all();
        $this->methods = Method::all();
        $this->prayers = Prayer::all();
        $this->alfajrPrayers = AlfajrPrayer::all();
        $this->fastings = Fasting::all();
        $this->readingQurans = ReadingQuran::all();
        $this->headdresses = Headdress::all();
        $this->veils = Veil::all();
        $this->robes = Robe::all();
        $this->beards = Beard::all();
        $this->tafaqahs = Tafaqah::all();
        $this->musicStatuses = MusicStatus::all();
        $this->showStatuses = ShowStatus::all();
        $this->countries = Country::all();
        $this->nationalities = Nationality::all();
        $this->residencies = Residency::all();
        $this->relocations = Relocate::all();
        $this->languages = Language::all();
        $this->languagePerfections = LanguagePerfection::all();
        $this->relationships = Relationship::all();
        $this->marriages = Marriage::all();
        $this->educations = Education::all();
        $this->workStatuses = WorkStatus::all();
        $this->friendStatuses = FriendStatus::all();
        $this->acceptWifeWorkStatuses = AcceptWifeWorkStatus::all();
        $this->acceptWifeStudyStatuses = AcceptWifeStudyStatus::all();
        $this->wifeWorkStatuses = WifeWorkStatus::all();
        $this->wifeStudyStatuses = WifeStudyStatus::all();
        $this->maritalStatuses = MaritalStatus::all();
        $this->childrenStatuses = ChildrenStatus::all();
        $this->childrenDesireStatuses = ChildrenDesireStatus::all();
        $this->polygamyStatuses = PolygamyStatus::all();
        $this->wifePolygamyStatuses = WifePolygamyStatus::all();
        $this->shelterTypes = ShelterType::all();
        $this->shelterShapes = ShelterShape::all();
        $this->shelterWays = ShelterWay::all();
        $this->bodies = Body::all();
        $this->skins = Skin::all();
        $this->hairColors = HairColor::all();
        $this->hairLengths = HairLength::all();
        $this->hairKinds = HairKind::all();
        $this->eyeColors = EyeColor::all();
        $this->eyeGlasses = EyeGlass::all();
        $this->healths = Health::all();
        $this->psychologicalPatterns = PsychologicalPattern::all();
        $this->smokes = Smoke::all();
        $this->alcohols = Alcohol::all();
        $this->halalFoods = HalalFood::all();
        $this->foods = Food::all();
        $this->hobbies = Hobby::all();
        $this->selectedCountry = $user->profile->hometown_id ?? null;
        $this->selectedState = $user->profile->state_id ?? null;

        $this->countryStates = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state['gender'] = $user->gender;
        $this->state['dob'] = $user->profile->dob ?? null;
        $this->state['postal_code'] = $user->profile->postal_code ?? null;
        $this->state['bio'] = $user->profile->bio ?? null;
        $this->state['partner_bio'] = $user->profile->partner_bio ?? null;
        $this->state['divorced_reason'] = $user->profile->socialStatus->divorced_reason ?? null;
        $this->state['competence'] = $user->profile->competence ?? null;
        $this->state['income'] = $user->profile->income ?? null;
        $this->state['lesson_listing'] = $user->profile->religionStatus->lesson_listing ?? null;

        $this->state['height'] = $user->profile->detail->height ?? null;
        $this->state['weight'] = $user->profile->detail->weight ?? null;
        $this->state['clarification'] = $user->profile->detail->clarification ?? null;
        $this->state['body_id'] = $user->profile->detail->body_id ?? null;
        $this->state['skin_id'] = $user->profile->detail->skin_id ?? null;
        $this->state['hair_color_id'] = $user->profile->detail->hair_color_id ?? null;
        $this->state['hair_length_id'] = $user->profile->detail->hair_length_id ?? null;
        $this->state['hair_kind_id'] = $user->profile->detail->hair_kind_id ?? null;
        $this->state['eye_color_id'] = $user->profile->detail->eye_color_id ?? null;
        $this->state['eye_glass_id'] = $user->profile->detail->eye_glass_id ?? null;
        $this->state['health_id'] = $user->profile->detail->health_id ?? null;
        $this->state['psychological_pattern_id'] = $user->profile->detail->psychological_pattern_id ?? null;

        $this->state['nationality_id'] = $user->profile->nationality_id ?? null;
        $this->state['relationship_id'] = $user->profile->relationship_id ?? null;
        $this->state['marriage_id'] = $user->profile->marriage_id ?? null;
        $this->state['residency_id'] = $user->profile->residency_id ?? null;
        $this->state['relocate_id'] = $user->profile->relocate_id ?? null;
        $this->state['education_id'] = $user->profile->education_id ?? null;
        $this->state['work_status_id'] = $user->profile->work_status_id ?? null;
        $this->state['marital_status_id'] = $user->profile->socialStatus->maritalStatus->id ?? null;
        $this->state['children_status_id'] = $user->profile->socialStatus->childrenStatus->id ?? null;
        $this->state['children_desire_status_id'] = $user->profile->socialStatus->childrenDesireStatus->id ?? null;
        $this->state['childrenCount'] = $user->profile->socialStatus->childrenStatus->count ?? null;
        $this->state['childrenInformation'] = $user->profile->socialStatus->childrenStatus->information ?? null;
        $this->state['polygamy_status_id'] = $user->profile->socialStatus->polygamyStatus->id ?? null;
        $this->state['shelter_type_id'] = $user->profile->socialStatus->shelterType->id ?? null;
        $this->state['shelter_shape_id'] = $user->profile->socialStatus->shelterShape->id ?? null;
        $this->state['shelter_way_id'] = $user->profile->socialStatus->shelterWay->id ?? null;
        $this->state['religion_id'] = $user->profile->religionStatus->religion->id ?? null;
        $this->state['obligation_id'] = $user->profile->religionStatus->obligation_id->id ?? null;
        $this->state['method_id'] = $user->profile->religionStatus->method->id ?? null;
        $this->state['prayer_id'] = $user->profile->religionStatus->prayer->id ?? null;
        $this->state['alfajr_prayer_id'] = $user->profile->religionStatus->alfajrPrayer->id ?? null;
        $this->state['fasting_id'] = $user->profile->religionStatus->fasting->id ?? null;
        $this->state['reading_quran_id'] = $user->profile->religionStatus->fastingreadingQuran->id ?? null;
        $this->state['headdress_id'] = $user->profile->religionStatus->headdress->id ?? null;
        $this->state['veil_id'] = $user->profile->religionStatus->veil->id ?? null;
        $this->state['robe_id'] = $user->profile->religionStatus->robe->id ?? null;
        $this->state['beard_id'] = $user->profile->religionStatus->beard->id ?? null;
        $this->state['tafaqah_id'] = $user->profile->religionStatus->tafaqah->id ?? null;
        $this->state['music_status_id'] = $user->profile->religionStatus->musicStatus->id ?? null;
        $this->state['show_status_id'] = $user->profile->religionStatus->showStatus->id ?? null;
        $this->state['friend_status_id'] = $user->profile->religionStatus->friendStatus->id ?? null;
        $this->state['accept_wife_work_status_id'] = $user->profile->accept_wife_work_status_id ?? null;
        $this->state['accept_wife_study_status_id'] = $user->profile->accept_wife_study_status_id ?? null;
        $this->state['wife_work_status_id'] = $user->profile->wife_work_status_id ?? null;
        $this->state['wife_study_status_id'] = $user->profile->wife_study_status_id ?? null;
        $this->state['language_native'] = $user->profile->languages()->native()->first()->id ?? null;
        $this->state['language_second'] = $user->profile->languages()->second()->first()->id ?? null;
        $this->state['language_third'] = $user->profile->languages()->third()->first()->id ?? null;
        $this->state['language_second_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfection->id ?? null;
        $this->state['language_third_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfection->id ?? null;
        $this->state['country_of_residence_id'] = $user->profile->country_of_residence_id;

        $this->state['smoke_id'] = $user->profile->lifestyle->smoke_id ?? null;
        $this->state['alcohol_id'] = $user->profile->lifestyle->alcohol_id ?? null;
        $this->state['halal_food_id'] = $user->profile->lifestyle->halal_food_id ?? null;
        $this->state['food_id'] = $user->profile->lifestyle->food_id ?? null;
        $this->state['books'] = $user->profile->lifestyle->books ?? null;
        $this->state['places'] = $user->profile->lifestyle->places ?? null;
        $this->state['interests'] = $user->profile->lifestyle->interests ?? null;

        $this->state['progress_bar'] = $user->profile->progress_bar;
    }

    public function render(): View
    {
        return view('livewire.profile');
    }

    public function updatedSelectedCountry(int $country): void
    {
        $this->countryStates = State::where('country_id', $country)->get();
    }

    public function updateOrCreateImage(): void
    {
        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $this->image;

        $this->validate([
            'image' => ['required', 'image', 'max:1024'],
        ]);

        $imageName = $image->store('images/pp');

        /** @var \App\Models\Profile $profile */
        $profile = auth()->user()->profile;

        $create = is_null($profile->image);

        if ($create) {
            $profile->image()->create([
                'url' => $imageName
            ]);
        } else {
            Storage::delete($profile->image->url);
            $profile->image()->update([
                'url' => $imageName
            ]);
        }

        $status = $create ? 'created' : 'updated';

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => "Image $status successfully",
            'timer' => 2000,
            'text' => '',
        ]);
    }

    public function updatePassword(UpdatesUserPasswords $updatesUserPasswords): void
    {
        $updatesUserPasswords->update(
            auth()->user(),
            $attributes = Arr::only($this->state, ['current_password', 'password', 'password_confirmation'])
        );

        foreach ($attributes as $key => $value) {
            $this->state[$key] = '';
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => "Password updated successfully",
            'timer' => 2000,
            'text' => '',
        ]);
    }

    public function updateInfo(UpdatesUserProfileInformation $updatesUserProfileInformation): void
    {
        $updatesUserProfileInformation->update(auth()->user(), [
            'name' => $this->state['name'],
            'username' => $this->state['username'],
            'phone' => $this->state['phone'],
            'email' => $this->state['email'],
            'postal_code' => $this->state['postal_code'] ?? null,
            'progress_bar' => $this->progressBar(),

            'gender' => $this->state['gender'] ?? null,
            'dob' => $this->state['dob'] ?? null,
            'bio' => $this->state['bio'] ?? null,
            'divorced_reason' => $this->state['divorced_reason'] ?? null,
            'income' => $this->state['income'] ?? null,
            'competence' => $this->state['competence'] ?? null,
            'partner_bio' => $this->state['partner_bio'] ?? null,
            'lesson_listing' => $this->state['lesson_listing'] ?? null,
            'height' => $this->state['height'] ?? null,
            'weight' => $this->state['weight'] ?? null,
            'hometown_id' => $this->selectedCountry ?? null,
            'state_id' => $this->selectedState ?? null,
            'country_of_residence_id' => $this->state['country_of_residence_id'] ?? null,
            'nationality_id' => $this->state['nationality_id'] ?? null,
            'residency_id' => $this->state['residency_id'] ?? null,
            'relocate_id' => $this->state['relocate_id'] ?? null,
            'relationship_id' => $this->state['relationship_id'] ?? null,
            'marriage_id' => $this->state['marriage_id'] ?? null,
            'education_id' => $this->state['education_id'] ?? null,
            'work_status_id' => $this->state['work_status_id'] ?? null,
            'accept_wife_work_status_id' => $this->state['accept_wife_work_status_id'] ?? null,
            'accept_wife_study_status_id' => $this->state['accept_wife_study_status_id'] ?? null,
            'wife_work_status_id' => $this->state['wife_work_status_id'] ?? null,
            'wife_study_status_id' => $this->state['wife_study_status_id'] ?? null,
            'marital_status_id' => $this->state['marital_status_id'] ?? null,
            'children_status_id' => $this->state['children_status_id'] ?? null,
            'children_desire_status_id' => $this->state['children_desire_status_id'] ?? null,
            'childrenCount' => $this->state['childrenCount'] ?? null,
            'childrenInformation' => $this->state['childrenInformation'] ?? null,
            'polygamy_status_id' => $this->state['polygamy_status_id'] ?? null,
            'shelter_type_id' => $this->state['shelter_type_id'] ?? null,
            'shelter_shape_id' => $this->state['shelter_shape_id'] ?? null,
            'shelter_way_id' => $this->state['shelter_way_id'] ?? null,
            'religion_id' => $this->state['religion_id'] ?? null,
            'obligation_id' => $this->state['obligation_id'] ?? null,
            'method_id' => $this->state['method_id'] ?? null,
            'prayer_id' => $this->state['prayer_id'] ?? null,
            'alfajr_prayer_id' => $this->state['alfajr_prayer_id'] ?? null,
            'fasting_id' => $this->state['fasting_id'] ?? null,
            'reading_quran_id' => $this->state['reading_quran_id'] ?? null,
            'headdress_id' => $this->state['headdress_id'] ?? null,
            'veil_id' => $this->state['veil_id'] ?? null,
            'robe_id' => $this->state['robe_id'] ?? null,
            'beard_id' => $this->state['beard_id'] ?? null,
            'tafaqah_id' => $this->state['tafaqah_id'] ?? null,
            'music_status_id' => $this->state['music_status_id'] ?? null,
            'show_status_id' => $this->state['show_status_id'] ?? null,
            'friend_status_id' => $this->state['friend_status_id'] ?? null,
            'language_native' => $this->state['language_native'] ?? null,
            'language_second' => $this->state['language_second'] ?? null,
            'language_third' => $this->state['language_third'] ?? null,
            'language_second_perfection_id' => $this->state['language_second_perfection_id'] ?? null,
            'language_third_perfection_id' => $this->state['language_third_perfection_id'] ?? null,

            'body_id' => $this->state['body_id'],
            'skin_id' => $this->state['skin_id'],
            'hair_color_id' => $this->state['hair_color_id'],
            'hair_length_id' => $this->state['hair_length_id'],
            'hair_kind_id' => $this->state['hair_kind_id'],
            'eye_color_id' => $this->state['eye_color_id'],
            'eye_glass_id' => $this->state['eye_glass_id'],
            'health_id' => $this->state['health_id'],
            'psychological_pattern_id' => $this->state['psychological_pattern_id'],
            'height' => $this->state['height'],
            'weight' => $this->state['weight'],
            'clarification' => $this->state['clarification'],

            'smoke_id' => $this->state['smoke_id'],
            'alcohol_id' => $this->state['alcohol_id'],
            'halal_food_id' => $this->state['halal_food_id'],
            'food_id' => $this->state['food_id'],
            'books' => $this->state['books'],
            'places' => $this->state['places'],
            'interests' => $this->state['interests'],
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => "Information updated successfully",
            'timer' => 2000,
            'text' => '',
        ]);
    }

    public function progressBar(): int|float
    {
        $count = 0;

        foreach ($this->state as $element) {
            if ($element == null) {
                $count++;
            }
        }

        return (count($this->state) - $count) * 100 / 100;
    }
}
