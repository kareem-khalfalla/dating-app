<?php

namespace App\Http\Livewire;

use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Actions\Fortify\UpdateUserProfileDetailInformation;
use App\Actions\Fortify\UpdateUserProfileEducationInformation;
use App\Actions\Fortify\UpdateUserProfileLifestyleInformation;
use App\Actions\Fortify\UpdateUserProfilePersonalInformation;
use App\Actions\Fortify\UpdateUserProfileReligionInformation;
use App\Actions\Fortify\UpdateUserProfileShapeInformation;
use App\Actions\Fortify\UpdateUserProfileSocialInformation;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;

    public $state = [];
    public $selectedCountry;
    public $successMessage = '';
    public $selectedState;
    public $countryStates;
    public $image;
    public $imageName;

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $this->state = $user->only([
            'name', 'email', 'username', 'phone', 'gender'
        ]);

        $this->imageName       = $user->avatar;
        $this->selectedCountry = $user->profile->country_of_origin_id;
        $this->selectedState   = $user->profile->state_id;

        $this->countryStates   = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state = array_merge($this->state, Arr::except($user->profile->toArray(), [
            'user_id', 'created_at', 'updated_at'
        ]));
    }

    public function render(): View
    {
        return view('livewire.profile-component');
    }

    public function dehydrate(): void
    {
        $progress = $this->progressBar();

        auth()->user()->profile->update([
            'progress_bar' => $progress > 100
                ? 100
                : $progress
        ]);
    }

    public function updatedSelectedCountry($country): void
    {
        $this->selectedState = null;
        $this->countryStates = State::where('country_id', $country)->get();
    }

    public function updateOrCreateImage(): void
    {
        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $this->image;

        if ($image) {

            $this->validate([
                'image' => ['nullable', 'image', 'max:1024'],
            ]);

            $imageName = $image->store('images/users-avatar');

            /** @var \App\Models\User $user */
            $user = auth()->user();

            if (!$user->avatar == 'images/users-avatar/default.png') {
                Storage::delete($user->avatar);
            }

            $user->update([
                'avatar' => $imageName,
            ]);

            $this->success('Image');
        }
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

        $this->success('Password');
    }

    public function updateUserInfo(UpdatesUserProfileInformation $updatesUserProfileInformation)
    {
        $updatesUserProfileInformation->update(auth()->user(), [
            'name'     => $this->state['name'],
            'username' => $this->state['username'],
            'phone'    => $this->state['phone'],
            'email'    => $this->state['email'],
            'gender'   => $this->state['gender'],
        ]);

        if (auth()->user()->username != $this->state['username']) {
            return redirect()->route('settings');
        }
        $this->success('Main Information');
    }

    public function updateDetails(UpdateUserProfileDetailInformation $updatesUserProfileInformation): void
    {
        $this->validate([
            'selectedCountry' => ['nullable', 'integer'],
            'selectedState' => ['nullable', 'integer'],
        ], [
            'selectedCountry.integer' => 'The :attribute is required'
        ]);

        $updatesUserProfileInformation->update(auth()->user(), [
            'dob'                        => $this->state['dob'],
            'country_of_origin_id'       => $this->selectedCountry,
            'state_id'                   => $this->selectedState,
            'country_of_residence_id'    => $this->state['country_of_residence_id'],
            'nationality_id'             => $this->state['nationality_id'],
            'postal_code'                => $this->state['postal_code'],
            'residence_status'           => $this->state['residence_status'],
            'relocate_status'            => $this->state['relocate_status'],
            'native_language_id'         => $this->state['native_language_id'],
            'second_language_id'         => $this->state['second_language_id'],
            'third_language_id'          => $this->state['third_language_id'],
            'second_language_perfection' => $this->state['second_language_perfection'],
            'third_language_perfection'  => $this->state['third_language_perfection'],
        ]);

        $this->success('Details Information');
    }

    public function updatePersonalInfo(UpdateUserProfilePersonalInformation $updateUserProfilePersonalInfo): void
    {
        $updateUserProfilePersonalInfo->update(auth()->user(), [
            'bio'                 => $this->state['bio'],
            'partner_bio'         => $this->state['partner_bio'],
            'relationship_status' => $this->state['relationship_status'],
            'marriage_status'     => $this->state['marriage_status'],
        ]);

        $this->success('Personal Information');
    }

    public function updateEducation(UpdateUserProfileEducationInformation $updateUserProfileEducationInformation): void
    {
        $updateUserProfileEducationInformation->update(auth()->user(), [
            'education_status' => $this->state['education_status'],
            'competence' => $this->state['competence'],
            'work' => $this->state['work'],
            'income' => $this->state['income'],
            'male_work_status' => $this->state['male_work_status'],
            'male_study_status' => $this->state['male_study_status'],
            'female_work_status' => $this->state['female_work_status'],
            'female_study_status' => $this->state['female_study_status'],
        ]);

        $this->success('Education and Work');
    }

    public function updateSocialInfo(UpdateUserProfileSocialInformation $updateUserProfileSocialInformation): void
    {
        $updateUserProfileSocialInformation->update(auth()->user(), [
            'marital_status'         => $this->state['marital_status'],
            'divorced_reason'        => $this->state['divorced_reason'],
            'children_status'        => $this->state['children_status'],
            'children_count'         => $this->state['children_count'],
            'children_desire_status' => $this->state['children_desire_status'],
            'children_information'   => $this->state['children_information'],
            'male_polygamy_status'        => $this->state['male_polygamy_status'],
            'female_polygamy_status'   => $this->state['female_polygamy_status'],
            'shelter_type'           => $this->state['shelter_type'],
            'shelter_shape'          => $this->state['shelter_shape'],
            'shelter_way'            => $this->state['shelter_way'],
        ]);

        $this->success('Socail Information');
    }

    public function updateReligionInfo(UpdateUserProfileReligionInformation $updateUserProfileReligionInformation): void
    {
        $updateUserProfileReligionInformation->update(auth()->user(), [
            'religion'        => $this->state['religion'],
            'religion_method' => $this->state['religion_method'],
            'obligation'      => $this->state['obligation'],
            'prayer'          => $this->state['prayer'],
            'alfajr_prayer'   => $this->state['alfajr_prayer'],
            'fasting'         => $this->state['fasting'],
            'reading_quran'   => $this->state['reading_quran'],
            'beard_status'    => $this->state['beard_status'],
            'robe_status'     => $this->state['robe_status'],
            'headdress'       => $this->state['headdress'],
            'veil_status'     => $this->state['veil_status'],
            'tafaqah_status'  => $this->state['tafaqah_status'],
            'lesson_listing'  => $this->state['lesson_listing'],
            'music_status'    => $this->state['music_status'],
            'show_status'     => $this->state['show_status'],
            'friend_status'   => $this->state['friend_status'],
        ]);

        $this->success('Religion Information');
    }

    public function updateShapeInfo(UpdateUserProfileShapeInformation $updateUserProfileShapeInformation): void
    {
        $updateUserProfileShapeInformation->update(auth()->user(), [
            'height'                => $this->state['height'],
            'weight'                => $this->state['weight'],
            'body_status'           => $this->state['body_status'],
            'skin_status'           => $this->state['skin_status'],
            'hair_color'            => $this->state['hair_color'],
            'hair_length'           => $this->state['hair_length'],
            'hair_kind'             => $this->state['hair_kind'],
            'eye_color'             => $this->state['eye_color'],
            'eye_glass'             => $this->state['eye_glass'],
            'health_status'         => $this->state['health_status'],
            'psychological_pattern' => $this->state['psychological_pattern'],
            'clarification'         => $this->state['clarification'],
        ]);

        $this->success('Shape Information');
    }

    public function updateLifestyleInfo(UpdateUserProfileLifestyleInformation $updateUserProfileLifestyleInformation): void
    {
        $updateUserProfileLifestyleInformation->update(auth()->user(), [
            'smoke_status'      => $this->state['smoke_status'],
            'alcohol_status'    => $this->state['alcohol_status'],
            'halal_food_status' => $this->state['halal_food_status'],
            'food_type'         => $this->state['food_type'],
            'hobbies'           => $this->state['hobbies'],
            'interests'         => $this->state['interests'],
            'books'             => $this->state['books'],
            'places'            => $this->state['places'],
        ]);

        $this->success('Lifestyle Information');
    }

    public function success(string $updatedForm = 'Information'): void
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => __("alerts.$updatedForm updated successfully"),
            'timer' => 2000,
            'text' => '',
        ]);
    }

    public function progressBar(): int|float
    {
        $count = -7;

        foreach ($this->state as $element) {
            if ($element == null) {
                $count++;
            }
        }

        $total = count($this->state);

        return number_format(100 - ($count / $total) * 100, 2);
    }
}
