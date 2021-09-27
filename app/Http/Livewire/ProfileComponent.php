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
use Illuminate\Validation\Rule;
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

        $this->imageName       = $user->avatar;
        $this->selectedCountry = $user->profile->country_of_origin_id;
        $this->selectedState   = $user->profile->state_id;

        $this->countryStates   = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state['gender']                  = $user->gender;
        $this->state['dob']                     = $user->profile->dob;
        $this->state['postal_code']             = $user->profile->postal_code;
        $this->state['nationality_id']          = $user->profile->nationality_id;
        $this->state['residence_status']        = $user->profile->residence_status;
        $this->state['country_of_residence_id'] = $user->profile->country_of_residence_id;
        $this->state['relocate_status']         = $user->profile->relocate_status;
        // 
        $this->state['native_language_id']         = $user->profile->native_language_id;
        $this->state['second_language_id']         = $user->profile->second_language_id;
        $this->state['third_language_id']          = $user->profile->third_language_id;
        $this->state['second_language_perfection'] = $user->profile->second_language_perfection;
        $this->state['third_language_perfection']  = $user->profile->third_language_perfection;

        $this->state['bio']                 = $user->profile->bio;
        $this->state['partner_bio']         = $user->profile->partner_bio;
        $this->state['relationship_status'] = $user->profile->relationship_status;
        $this->state['marriage_status']     = $user->profile->marriage_status;
        // 
        $this->state['education_status']         = $user->profile->education_status;
        $this->state['competence']               = $user->profile->competence;
        $this->state['work_status']              = $user->profile->work_status;
        $this->state['income']                   = $user->profile->income;
        $this->state['accept_wife_work_status']  = $user->profile->accept_wife_work_status;
        $this->state['accept_wife_study_status'] = $user->profile->accept_wife_study_status;
        $this->state['wife_work_status']         = $user->profile->wife_work_status;
        $this->state['wife_study_status']        = $user->profile->wife_study_status;
        $this->state['marital_status']           = $user->profile->marital_status;
        $this->state['divorced_reason']          = $user->profile->divorced_reason;
        $this->state['children_status']          = $user->profile->children_status;
        $this->state['children_desire_status']   = $user->profile->children_desire_status;
        $this->state['children_count']           = $user->profile->children_count;
        $this->state['children_information']     = $user->profile->children_information;
        $this->state['polygamy_status']          = $user->profile->polygamy_status;
        $this->state['wife_polygamy_status']     = $user->profile->wife_polygamy_status;
        $this->state['shelter_type']             = $user->profile->shelter_type;
        $this->state['shelter_shape']            = $user->profile->shelter_shape;
        $this->state['shelter_way']              = $user->profile->shelter_way;
        // 
        $this->state['religion']        = $user->profile->religion;
        $this->state['religion_method'] = $user->profile->religion_method;
        $this->state['obligation']      = $user->profile->obligation;
        $this->state['prayer']          = $user->profile->prayer;
        $this->state['alfajr_prayer']   = $user->profile->alfajr_prayer;
        $this->state['fasting']         = $user->profile->fasting;
        $this->state['reading_quran']   = $user->profile->reading_quran;
        $this->state['beard_status']    = $user->profile->beard_status;
        $this->state['robe_status']     = $user->profile->robe_status;
        $this->state['veil_status']     = $user->profile->veil_status;
        $this->state['headdress']       = $user->profile->headdress;
        $this->state['tafaqah_status']  = $user->profile->tafaqah_status;
        $this->state['lesson_listing']  = $user->profile->lesson_listing;
        $this->state['music_status']    = $user->profile->music_status;
        $this->state['show_status']     = $user->profile->show_status;
        $this->state['friend_status']   = $user->profile->friend_status;
        //
        $this->state['height']                = $user->profile->height;
        $this->state['weight']                = $user->profile->weight;
        $this->state['body_status']           = $user->profile->body_status;
        $this->state['skin_status']           = $user->profile->skin_status;
        $this->state['hair_color']            = $user->profile->hair_color;
        $this->state['hair_length']           = $user->profile->hair_length;
        $this->state['hair_kind']             = $user->profile->hair_kind;
        $this->state['eye_color']             = $user->profile->eye_color;
        $this->state['eye_glass']             = $user->profile->eye_glass;
        $this->state['health_status']         = $user->profile->health_status;
        $this->state['psychological_pattern'] = $user->profile->psychological_pattern;
        $this->state['clarification']         = $user->profile->clarification;
        // 
        $this->state['smoke_status']      = $user->profile->smoke_status;
        $this->state['alcohol_status']    = $user->profile->alcohol_status;
        $this->state['halal_food_status'] = $user->profile->halal_food_status;
        $this->state['food_type']         = $user->profile->food_type;
        $this->state['hobbies']           = $user->profile->hobbies;
        $this->state['interests']         = $user->profile->interests;
        $this->state['books']             = $user->profile->books;
        $this->state['places']            = $user->profile->places;
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
            'work_status' => $this->state['work_status'],
            'income' => $this->state['income'],
            'accept_wife_work_status' => $this->state['accept_wife_work_status'],
            'accept_wife_study_status' => $this->state['accept_wife_study_status'],
            'wife_work_status' => $this->state['wife_work_status'],
            'wife_study_status' => $this->state['wife_study_status'],
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
            'polygamy_status'        => $this->state['polygamy_status'],
            'wife_polygamy_status'   => $this->state['wife_polygamy_status'],
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
