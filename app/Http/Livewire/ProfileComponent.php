<?php

namespace App\Http\Livewire;

use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
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

        $this->selectedCountry = $user->profile->countries()->hometown()->first()->id ?? null;

        $this->selectedState = $user->profile->state_id ?? null;

        $this->countryStates = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();

        $this->state['gender'] = $user->gender;
        $this->state['dob'] = $user->profile->dob ?? null;
        $this->state['postal_code'] = $user->profile->postal_code ?? null;
        $this->state['bio'] = $user->profile->bio ?? null;
        $this->state['partner_bio'] = $user->profile->partner_bio ?? null;
        $this->state['divorced_reason'] = $user->profile->divorced_reason ?? null;
        $this->state['competence'] = $user->profile->competence ?? null;
        $this->state['income'] = $user->profile->income ?? null;
        $this->state['lesson_listing'] = $user->profile->lesson_listing ?? null;
        $this->state['height'] = $user->profile->height ?? null;
        $this->state['weight'] = $user->profile->weight ?? null;
        $this->state['clarification'] = $user->profile->clarification ?? null;
        $this->state['body_status_id'] = $user->profile->body_status_id ?? null;
        $this->state['skin_status_id'] = $user->profile->skin_status_id ?? null;
        $this->state['hair_color_id'] = $user->profile->hair_color_id ?? null;
        $this->state['hair_length_id'] = $user->profile->hair_length_id ?? null;
        $this->state['hair_kind_id'] = $user->profile->hair_kind_id ?? null;
        $this->state['eye_color_id'] = $user->profile->eye_color_id ?? null;
        $this->state['eye_glass_id'] = $user->profile->eye_glass_id ?? null;
        $this->state['health_status_id'] = $user->profile->health_status_id ?? null;
        $this->state['psychological_pattern_id'] = $user->profile->psychological_pattern_id ?? null;
        $this->state['nationality_id'] = $user->profile->nationality_id ?? null;
        $this->state['relationship_status_id'] = $user->profile->relationship_status_id ?? null;
        $this->state['marriage_status_id'] = $user->profile->marriage_status_id ?? null;
        $this->state['residency_status_id'] = $user->profile->residency_status_id ?? null;
        $this->state['relocate_status_id'] = $user->profile->relocate_status_id ?? null;
        $this->state['education_status_id'] = $user->profile->education_status_id ?? null;
        $this->state['work_status_id'] = $user->profile->work_status_id ?? null;
        $this->state['marital_status_id'] = $user->profile->maritalStatus->id ?? null;
        $this->state['children_status_id'] = $user->profile->childrenStatus->id ?? null;
        $this->state['children_desire_status_id'] = $user->profile->childrenDesireStatus->id ?? null;
        $this->state['children_count'] = $user->profile->children_count ?? null;
        $this->state['children_information'] = $user->profile->children_information ?? null;
        $this->state['polygamy_status_id'] = $user->profile->polygamyStatus->id ?? null;
        $this->state['shelter_type_id'] = $user->profile->shelterType->id ?? null;
        $this->state['shelter_shape_id'] = $user->profile->shelterShape->id ?? null;
        $this->state['shelter_way_id'] = $user->profile->shelterWay->id ?? null;
        $this->state['religion_id'] = $user->profile->religion->id ?? null;
        $this->state['obligation_id'] = $user->profile->obligation_id ?? null;
        $this->state['religion_method_id'] = $user->profile->religionMethod->id ?? null;
        $this->state['prayer_id'] = $user->profile->prayer->id ?? null;
        $this->state['alfajr_prayer_id'] = $user->profile->alfajrPrayer->id ?? null;
        $this->state['fasting_id'] = $user->profile->fasting->id ?? null;
        $this->state['reading_quran_id'] = $user->profile->reading_quran_id ?? null;
        $this->state['headdress_id'] = $user->profile->headdress->id ?? null;
        $this->state['veil_status_id'] = $user->profile->veilStatus->id ?? null;
        $this->state['robe_status_id'] = $user->profile->robe_status_id ?? null;
        $this->state['beard_status_id'] = $user->profile->beardStatus->id ?? null;
        $this->state['tafaqah_status_id'] = $user->profile->tafaqahStatus->id ?? null;
        $this->state['music_status_id'] = $user->profile->musicStatus->id ?? null;
        $this->state['show_status_id'] = $user->profile->showStatus->id ?? null;
        $this->state['friend_status_id'] = $user->profile->friendStatus->id ?? null;
        $this->state['accept_wife_work_status_id'] = $user->profile->accept_wife_work_status_id ?? null;
        $this->state['accept_wife_study_status_id'] = $user->profile->accept_wife_study_status_id ?? null;
        $this->state['wife_work_status_id'] = $user->profile->wife_work_status_id ?? null;
        $this->state['wife_study_status_id'] = $user->profile->wife_study_status_id ?? null;
        $this->state['hobby_id'] = $user->profile->hobbies()->id ?? null;
        $this->state['country_residence'] = $user->profile->countries()->residence()->first()->id ?? null;
        $this->state['language_native'] = $user->profile->languages()->native()->first()->id ?? null;
        $this->state['language_second'] = $user->profile->languages()->second()->first()->id ?? null;
        $this->state['language_third'] = $user->profile->languages()->third()->first()->id ?? null;
        $this->state['language_second_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfectionStatus->id ?? null;
        $this->state['language_third_perfection_id'] = $user->profile->languages()->second()->first()->languagePerfectionStatus->id ?? null;
        $this->state['smoke_status_id'] = $user->profile->smoke_status_id ?? null;
        $this->state['alcohol_status_id'] = $user->profile->alcohol_status_id ?? null;
        $this->state['halal_food_status_id'] = $user->profile->halal_food_status_id ?? null;
        $this->state['food_type_id'] = $user->profile->food_type_id ?? null;
        $this->state['books'] = $user->profile->books ?? null;
        $this->state['places'] = $user->profile->places ?? null;
        $this->state['interests'] = $user->profile->interests ?? null;
        $this->state['progress_bar'] = $user->profile->progress_bar;
    }

    public function render(): View
    {
        return view('livewire.profile-component');
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

        $imageName = $image->store('images/users-avatar');

        /** @var \App\Models\User $user */
        $user = auth()->user();

        if (!$user->avatar == 'images/users-avatar/default.png') {
            Storage::delete($user->avatar);
        }

        $user->update([
            'avatar' => $imageName,
        ]);


        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => "Image updated successfully",
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
            'state_id' => $this->selectedState ?? null,
            'nationality_id' => $this->state['nationality_id'] ?? null,
            'residency_status_id' => $this->state['residency_status_id'] ?? null,
            'relocate_status_id' => $this->state['relocate_status_id'] ?? null,
            'relationship_status_id' => $this->state['relationship_status_id'] ?? null,
            'marriage_status_id' => $this->state['marriage_status_id'] ?? null,
            'education_status_id' => $this->state['education_status_id'] ?? null,
            'work_status_id' => $this->state['work_status_id'] ?? null,
            'accept_wife_work_status_id' => $this->state['accept_wife_work_status_id'] ?? null,
            'accept_wife_study_status_id' => $this->state['accept_wife_study_status_id'] ?? null,
            'wife_work_status_id' => $this->state['wife_work_status_id'] ?? null,
            'wife_study_status_id' => $this->state['wife_study_status_id'] ?? null,
            'marital_status_id' => $this->state['marital_status_id'] ?? null,
            'children_status_id' => $this->state['children_status_id'] ?? null,
            'children_desire_status_id' => $this->state['children_desire_status_id'] ?? null,
            'children_count' => $this->state['children_count'] ?? null,
            'children_information' => $this->state['children_information'] ?? null,
            'polygamy_status_id' => $this->state['polygamy_status_id'] ?? null,
            'shelter_type_id' => $this->state['shelter_type_id'] ?? null,
            'shelter_shape_id' => $this->state['shelter_shape_id'] ?? null,
            'shelter_way_id' => $this->state['shelter_way_id'] ?? null,
            'religion_id' => $this->state['religion_id'] ?? null,
            'obligation_id' => $this->state['obligation_id'] ?? null,
            'religion_method_id' => $this->state['religion_method_id'] ?? null,
            'prayer_id' => $this->state['prayer_id'] ?? null,
            'alfajr_prayer_id' => $this->state['alfajr_prayer_id'] ?? null,
            'fasting_id' => $this->state['fasting_id'] ?? null,
            'reading_quran_id' => $this->state['reading_quran_id'] ?? null,
            'headdress_id' => $this->state['headdress_id'] ?? null,
            'veil_status_id' => $this->state['veil_status_id'] ?? null,
            'robe_status_id' => $this->state['robe_status_id'] ?? null,
            'beard_status_id' => $this->state['beard_status_id'] ?? null,
            'tafaqah_status_id' => $this->state['tafaqah_status_id'] ?? null,
            'music_status_id' => $this->state['music_status_id'] ?? null,
            'show_status_id' => $this->state['show_status_id'] ?? null,
            'friend_status_id' => $this->state['friend_status_id'] ?? null,
            
            'country_hometown' => $this->selectedCountry ?? null,
            'country_residence' => $this->state['country_residence'] ?? null,
            'language_native' => $this->state['language_native'] ?? null,
            'language_second' => $this->state['language_second'] ?? null,
            'language_third' => $this->state['language_third'] ?? null,
            'language_second_perfection_id' => $this->state['language_second_perfection_id'] ?? null,
            'language_third_perfection_id' => $this->state['language_third_perfection_id'] ?? null,
            'hobby_id' => $this->state['hobby_id'] ?? null,

            'body_status_id' => $this->state['body_status_id'],
            'skin_status_id' => $this->state['skin_status_id'],
            'hair_color_id' => $this->state['hair_color_id'],
            'hair_length_id' => $this->state['hair_length_id'],
            'hair_kind_id' => $this->state['hair_kind_id'],
            'eye_color_id' => $this->state['eye_color_id'],
            'eye_glass_id' => $this->state['eye_glass_id'],
            'health_status_id' => $this->state['health_status_id'],
            'psychological_pattern_id' => $this->state['psychological_pattern_id'],
            'height' => $this->state['height'],
            'weight' => $this->state['weight'],
            'clarification' => $this->state['clarification'],

            'smoke_status_id' => $this->state['smoke_status_id'],
            'alcohol_status_id' => $this->state['alcohol_status_id'],
            'halal_food_status_id' => $this->state['halal_food_status_id'],
            'food_type_id' => $this->state['food_type_id'],
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

        $total = count($this->state);

        return number_format(100 - ($count / $total) * 100, 2);
    }
}
