<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\State;
use App\Models\User;
use App\Traits\FormValidation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use FormValidation, WithFileUploads;

    public int $currentStep = 1;

    public array $state = [];

    public $selectedCountry;
    public $selectedState;
    public $countryStates;
    public $image;

    public User $user;

    public function mount(): void
    {
        $this->countryStates = !is_null($this->selectedCountry)
            ? State::where('country_id', $this->selectedCountry)->get()
            : collect();
    }

    public function render()
    {
        return view('livewire.admin.users.create-user')->layout('layouts.admin');
    }

    public function updatedSelectedCountry($country): void
    {
        $this->selectedState = null;
        $this->countryStates = State::where('country_id', $country)->get();
    }

    public function nextStep(): void
    {
        $userData = Validator::make($this->state, $this->createUserRules())->validate();
        $userData['password'] = bcrypt($userData['password']);
        $this->user = User::create($userData);
        $this->user->profile()->create();

        $this->currentStep = 2;
    }

    public function store(): User
    {
        $user = $this->user;
        $this->validate([
            'selectedCountry' => 'required',
            'selectedState'   => 'required',
            'image'           => 'required|image',
        ]);
        
        Validator::make($this->state, $this->profileDetailsRules())->validate();
        Validator::make($this->state, $this->profilePersonalRules())->validate();
        Validator::make($this->state, $this->profileReligionRules($user))->validate();
        Validator::make($this->state, $this->profileEducationRules($user))->validate();
        Validator::make($this->state, $this->profileLifestyleRules())->validate();
        Validator::make($this->state, $this->profileShapeRules())->validate();
        Validator::make($this->state, $this->profileSocialRules($user))->validate();
        
        /** @var \Illuminate\Http\UploadedFile */
        $image = $this->image;
        $imageName = $image->store('images/users-avatar');
        $user->update([
            'avatar' => $imageName
        ]);

        $user->profile()->update(Arr::except($this->state, [
            'name', 'gender', 'email', 'password', 'username', 'phone', 'password_confirmation',
        ]));

        $user->profile()->update([
            'country_of_origin_id' => $this->selectedCountry
        ]);


        $this->state = [];
        $this->currentStep = 1;

        return $user;
    }
}
