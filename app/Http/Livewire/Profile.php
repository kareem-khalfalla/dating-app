<?php

namespace App\Http\Livewire;

use App\Models\AcceptWifeStudyStatus;
use App\Models\AcceptWifeWorkStatus;
use App\Models\Country;
use App\Models\Education;
use App\Models\Language;
use App\Models\LanguagePerfection;
use App\Models\Marriage;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Relocate;
use App\Models\Residency;
use App\Models\State;
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
    public $acceptWifeWorkStatuses;
    public $acceptWifeStudyStatuses;
    public $wifeWorkStatuses;
    public $wifeStudyStatuses;
    public $countries;
    public $selectedCountry;
    public $countryStates;
    public $selectedState;

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
        $this->acceptWifeWorkStatuses = AcceptWifeWorkStatus::all();
        $this->acceptWifeStudyStatuses = AcceptWifeStudyStatus::all();
        $this->wifeWorkStatuses = WifeWorkStatus::all();
        $this->wifeStudyStatuses = WifeStudyStatus::all();
        $this->selectedCountry = $user->profile->hometown_id ?? null;
        $this->selectedState = $user->profile->state_id ?? null;

        $this->countryStates = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state['gender'] = $user->profile->gender;
        $this->state['dob'] = $user->profile->dob;
        $this->state['postal_code'] = $user->profile->postal_code;
        $this->state['bio'] = $user->profile->bio;
        $this->state['partner_bio'] = $user->profile->partner_bio;
        $this->state['competence'] = $user->profile->competence;
        $this->state['income'] = $user->profile->income;

        $this->state['nationality_id'] = $user->profile->nationality_id;
        $this->state['relationship_id'] = $user->profile->relationship_id;
        $this->state['marriage_id'] = $user->profile->marriage_id;
        $this->state['residency_id'] = $user->profile->residency_id;
        $this->state['relocate_id'] = $user->profile->relocate_id;
        $this->state['education_id'] = $user->profile->education_id;
        $this->state['work_status_id'] = $user->profile->work_status_id;
        $this->state['accept_wife_work_status_id'] = $user->profile->accept_wife_work_status_id;
        $this->state['accept_wife_study_status_id'] = $user->profile->accept_wife_study_status_id;
        $this->state['wife_work_status_id'] = $user->profile->wife_work_status_id;
        $this->state['wife_study_status_id'] = $user->profile->wife_study_status_id;
        $this->state['language_native'] = $user->profile->languages()->native()->first()->id ?? null;
        $this->state['language_second'] = $user->profile->languages()->second()->first()->id ?? null;
        $this->state['language_third'] = $user->profile->languages()->third()->first()->id ?? null;
        $this->state['language_second_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfection->id ?? null;
        $this->state['language_third_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfection->id ?? null;
        $this->state['country_of_residence_id'] = $user->profile->country_of_residence_id;
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
            
            'gender' => $this->state['gender'] ?? null,
            'dob' => $this->state['dob'] ?? null,
            'bio' => $this->state['bio'] ?? null,
            'income' => $this->state['income'] ?? null,
            'competence' => $this->state['competence'] ?? null,
            'partner_bio' => $this->state['partner_bio'] ?? null,
            'postal_code' => $this->state['postal_code'] ?? null,
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
            'language_native' => $this->state['language_native'] ?? null,
            'language_second' => $this->state['language_second'] ?? null,
            'language_third' => $this->state['language_third'] ?? null,
            'language_second_perfection_id' => $this->state['language_second_perfection_id'] ?? null,
            'language_third_perfection_id' => $this->state['language_third_perfection_id'] ?? null,
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => "Information updated successfully",
            'timer' => 2000,
            'text' => '',
        ]);
    }
}
