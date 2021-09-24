<?php

namespace App\Http\Livewire;

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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
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
            'name', 'email', 'username', 'phone'
        ]);

        $this->imageName = $user->avatar;

        $this->selectedCountry = $user->profile->countryOfOrigin->id ?? null;

        $this->selectedState = $user->profile->state_id ?? null;

        $this->countryStates = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state['gender'] = $user->gender;

        $this->state['dob'] = $user->profile->dob ?? null;
        $this->state['postal_code'] = $user->profile->postal_code ?? null;
        $this->state['nationality_id'] = $user->profile->nationality_id ?? null;
        $this->state['residence_status_id'] = $user->profile->residence_status_id ?? null;
        $this->state['relocate_status_id'] = $user->profile->relocate_status_id ?? null;
        $this->state['country_of_residence_id'] = $user->profile->countryOfResidence->id ?? null;
        // 
        $this->state['language_native_id'] = $user->profile->languageNative->id ?? null;
        $this->state['language_second_id'] = $user->profile->languageSecond->id ?? null;
        $this->state['language_third_id'] = $user->profile->languageThird->id ?? null;
        $this->state['language_second_perfection_id'] = $user->profile->languageSecond->language_perfection_status_id ?? null;
        $this->state['language_third_perfection_id'] = $user->profile->languageThird->language_perfection_status_id ?? null;

        $this->state['bio'] = $user->profile->bio ?? null;
        $this->state['partner_bio'] = $user->profile->partner_bio ?? null;
        $this->state['relationship_status_id'] = $user->profile->relationship_status_id ?? null;
        $this->state['marriage_status_id'] = $user->profile->marriage_status_id ?? null;
        // 
        $this->state['education_status_id'] = $user->profile->education_status_id ?? null;
        $this->state['competence'] = $user->profile->competence ?? null;
        $this->state['work_status_id'] = $user->profile->work_status_id ?? null;
        $this->state['income'] = $user->profile->income ?? null;
        $this->state['accept_wife_work_status_id'] = $user->profile->accept_wife_work_status_id ?? null;
        $this->state['accept_wife_study_status_id'] = $user->profile->accept_wife_study_status_id ?? null;
        $this->state['wife_work_status_id'] = $user->profile->wife_work_status_id ?? null;
        $this->state['wife_study_status_id'] = $user->profile->wife_study_status_id ?? null;
        $this->state['marital_status_id'] = $user->profile->marital_status_id ?? null;
        $this->state['divorced_reason'] = $user->profile->divorced_reason ?? null;
        $this->state['children_status_id'] = $user->profile->children_status_id ?? null;
        $this->state['children_desire_status_id'] = $user->profile->children_desire_status_id ?? null;
        $this->state['children_count'] = $user->profile->children_count ?? null;
        $this->state['children_information'] = $user->profile->children_information ?? null;
        $this->state['polygamy_status_id'] = $user->profile->polygamy_status_id ?? null;
        $this->state['wife_polygamy_status_id'] = $user->profile->wife_polygamy_status_id ?? null;
        $this->state['shelter_type_id'] = $user->profile->shelter_type_id ?? null;
        $this->state['shelter_shape_id'] = $user->profile->shelter_shape_id ?? null;
        $this->state['shelter_way_id'] = $user->profile->shelter_way_id ?? null;
        // 
        $this->state['religion_id'] = $user->profile->religion_id ?? null;
        $this->state['religion_method_id'] = $user->profile->religion_method_id ?? null;
        $this->state['obligation_id'] = $user->profile->obligation_id ?? null;
        $this->state['prayer_id'] = $user->profile->prayer_id ?? null;
        $this->state['alfajr_prayer_id'] = $user->profile->alfajr_prayer_id ?? null;
        $this->state['fasting_id'] = $user->profile->fasting_id ?? null;
        $this->state['reading_quran_id'] = $user->profile->reading_quran_id ?? null;
        $this->state['beard_status_id'] = $user->profile->beard_status_id ?? null;
        $this->state['robe_status_id'] = $user->profile->robe_status_id ?? null;
        $this->state['veil_status_id'] = $user->profile->veil_status_id ?? null;
        $this->state['headdress_id'] = $user->profile->headdress_id ?? null;
        $this->state['tafaqah_status_id'] = $user->profile->tafaqah_status_id ?? null;
        $this->state['lesson_listing'] = $user->profile->lesson_listing ?? null;
        $this->state['music_status_id'] = $user->profile->music_status_id ?? null;
        $this->state['show_status_id'] = $user->profile->show_status_id ?? null;
        $this->state['friend_status_id'] = $user->profile->friend_status_id ?? null;
        //
        $this->state['height'] = $user->profile->height ?? null;
        $this->state['weight'] = $user->profile->weight ?? null;
        $this->state['body_status_id'] = $user->profile->body_status_id ?? null;
        $this->state['skin_status_id'] = $user->profile->skin_status_id ?? null;
        $this->state['hair_color_id'] = $user->profile->hair_color_id ?? null;
        $this->state['hair_length_id'] = $user->profile->hair_length_id ?? null;
        $this->state['hair_kind_id'] = $user->profile->hair_kind_id ?? null;
        $this->state['eye_color_id'] = $user->profile->eye_color_id ?? null;
        $this->state['eye_glass_id'] = $user->profile->eye_glass_id ?? null;
        $this->state['health_status_id'] = $user->profile->health_status_id ?? null;
        $this->state['psychological_pattern_id'] = $user->profile->psychological_pattern_id ?? null;
        $this->state['clarification'] = $user->profile->clarification ?? null;
        // 
        $this->state['smoke_status_id'] = $user->profile->smoke_status_id ?? null;
        $this->state['alcohol_status_id'] = $user->profile->alcohol_status_id ?? null;
        $this->state['halal_food_status_id'] = $user->profile->halal_food_status_id ?? null;
        $this->state['food_type_id'] = $user->profile->food_type_id ?? null;
        // TODO: it acts like one to many relationship till we make it multiple hobbies or not.
        $this->state['hobby_id'] = $user->profile->hobbies->first()->id ?? null;
        $this->state['interests'] = $user->profile->interests ?? null;
        $this->state['books'] = $user->profile->books ?? null;
        $this->state['places'] = $user->profile->places ?? null;
    }

    public function render(): View
    {
        return view('livewire.profile-component');
    }

    public function updated()
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

        $this->validate([
            'image' => ['required', 'image', 'max:1024'],
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

    public function updateUserInfo(UpdatesUserProfileInformation $updatesUserProfileInformation): void
    {
        $updatesUserProfileInformation->update(auth()->user(), [
            'name'     => $this->state['name'],
            'username' => $this->state['username'],
            'phone'    => $this->state['phone'],
            'email'    => $this->state['email'],
            'gender'   => $this->state['gender'],
        ]);

        $this->success('Main Information');
    }

    public function updateDetails(UpdateUserProfileDetailInformation $updatesUserProfileInformation): void
    {
        $this->validate([
            'selectedCountry' => ['required', 'integer'],
            'selectedState' => [Rule::requiredIf(function () {
                return (int) $this->selectedCountry !== 0;
            })],
        ], [
            '*.integer' => 'The :attribute is required'
        ]);

        $updatesUserProfileInformation->update(auth()->user(), [
            'dob' => $this->state['dob'],
            'country_of_origin_id' => $this->selectedCountry,
            'state_id' => $this->selectedState,
            'country_of_residence_id' => $this->state['country_of_residence_id'],
            'nationality_id' => $this->state['nationality_id'],
            'postal_code' => $this->state['postal_code'],
            'residence_status_id' => $this->state['residence_status_id'],
            'relocate_status_id' => $this->state['relocate_status_id'],
            'language_native_id' => $this->state['language_native_id'],
            'language_second_id' => $this->state['language_second_id'],
            'language_third_id' => $this->state['language_third_id'],
            'language_second_perfection_id' => $this->state['language_second_perfection_id'] ?? null,
            'language_third_perfection_id' => $this->state['language_third_perfection_id'] ?? null,
        ]);

        $this->success('Details Information');
    }

    public function updatePersonalInfo(UpdateUserProfilePersonalInformation $updateUserProfilePersonalInfo): void
    {
        $updateUserProfilePersonalInfo->update(auth()->user(), [
            'bio' => $this->state['bio'] ?? null,
            'partner_bio' => $this->state['partner_bio'] ?? null,
            'relationship_status_id' => $this->state['relationship_status_id'] ?? null,
            'marriage_status_id' => $this->state['marriage_status_id'] ?? null,
        ]);

        $this->success('Personal Information');
    }

    public function updateEducation(UpdateUserProfileEducationInformation $updateUserProfileEducationInformation): void
    {
        $updateUserProfileEducationInformation->update(auth()->user(), [
            'education_status_id' => $this->state['education_status_id'],
            'competence' => $this->state['competence'],
            'work_status_id' => $this->state['work_status_id'],
            'income' => $this->state['income'],
            'accept_wife_work_status_id' => $this->state['accept_wife_work_status_id'],
            'accept_wife_study_status_id' => $this->state['accept_wife_study_status_id'],
            'wife_work_status_id' => $this->state['wife_work_status_id'],
            'wife_study_status_id' => $this->state['wife_study_status_id'],
        ]);

        $this->success('Education and Work');
    }

    public function updateSocialInfo(UpdateUserProfileSocialInformation $updateUserProfileSocialInformation): void
    {
        $updateUserProfileSocialInformation->update(auth()->user(), [
            'marital_status_id' => $this->state['marital_status_id'],
            'divorced_reason' => $this->state['divorced_reason'],
            'children_status_id' => $this->state['children_status_id'],
            'children_count' => $this->state['children_count'],
            'children_desire_status_id' => $this->state['children_desire_status_id'],
            'children_information' => $this->state['children_information'],
            'polygamy_status_id' => $this->state['polygamy_status_id'],
            'wife_polygamy_status_id' => $this->state['wife_polygamy_status_id'],
            'shelter_type_id' => $this->state['shelter_type_id'],
            'shelter_shape_id' => $this->state['shelter_shape_id'],
            'shelter_way_id' => $this->state['shelter_way_id'],
        ]);

        $this->success('Socail Information');
    }

    public function updateReligionInfo(UpdateUserProfileReligionInformation $updateUserProfileReligionInformation): void
    {
        $updateUserProfileReligionInformation->update(auth()->user(), [
            'religion_id' => $this->state['religion_id'],
            'religion_method_id' => $this->state['religion_method_id'],
            'obligation_id' => $this->state['obligation_id'],
            'prayer_id' => $this->state['prayer_id'],
            'alfajr_prayer_id' => $this->state['alfajr_prayer_id'],
            'fasting_id' => $this->state['fasting_id'],
            'reading_quran_id' => $this->state['reading_quran_id'],
            'beard_status_id' => $this->state['beard_status_id'],
            'robe_status_id' => $this->state['robe_status_id'],
            'headdress_id' => $this->state['headdress_id'],
            'veil_status_id' => $this->state['veil_status_id'],
            'tafaqah_status_id' => $this->state['tafaqah_status_id'],
            'lesson_listing' => $this->state['lesson_listing'],
            'music_status_id' => $this->state['music_status_id'],
            'show_status_id' => $this->state['show_status_id'],
            'friend_status_id' => $this->state['friend_status_id'],
        ]);

        $this->success('Religion Information');
    }

    public function updateShapeInfo(UpdateUserProfileShapeInformation $updateUserProfileShapeInformation): void
    {
        $updateUserProfileShapeInformation->update(auth()->user(), [
            'height' => $this->state['height'] ?? null,
            'weight' => $this->state['weight'] ?? null,
            'body_status_id' => $this->state['body_status_id'],
            'skin_status_id' => $this->state['skin_status_id'],
            'hair_color_id' => $this->state['hair_color_id'],
            'hair_length_id' => $this->state['hair_length_id'],
            'hair_kind_id' => $this->state['hair_kind_id'],
            'eye_color_id' => $this->state['eye_color_id'],
            'eye_glass_id' => $this->state['eye_glass_id'],
            'health_status_id' => $this->state['health_status_id'],
            'psychological_pattern_id' => $this->state['psychological_pattern_id'],
            'clarification' => $this->state['clarification'],
        ]);

        $this->success('Shape Information');
    }

    public function updateLifestyleInfo(UpdateUserProfileLifestyleInformation $updateUserProfileLifestyleInformation): void
    {
        $updateUserProfileLifestyleInformation->update(auth()->user(), [
            'smoke_status_id' => $this->state['smoke_status_id'],
            'alcohol_status_id' => $this->state['alcohol_status_id'],
            'halal_food_status_id' => $this->state['halal_food_status_id'],
            'food_type_id' => $this->state['food_type_id'],
            'hobby_id' => $this->state['hobby_id'] ?? null,
            'interests' => $this->state['interests'],
            'books' => $this->state['books'],
            'places' => $this->state['places'],
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
