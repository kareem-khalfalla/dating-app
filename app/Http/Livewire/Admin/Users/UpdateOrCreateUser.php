<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\State;
use App\Models\User;
use App\Traits\FormValidation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateOrCreateUser extends Component
{
    use FormValidation, WithFileUploads;

    public int $currentStep = 1;

    public array $state = [];

    public $selectedCountry;
    public $selectedState;
    public $countryStates;
    public $image;

    public ?User $user = null;
    public array $userArr = [];

    public function mount(): void
    {
        if (!is_null($this->user)) {
            $this->state = $this->userArr = Arr::except($this->user->toArray(), [
                'id', 'email_verified_at', 'last_seen_at', 'last_message_at', 'two_factor_secret',
                'two_factor_recovery_codes', 'fake', 'status', 'created_at', 'updated_at'
            ]);
            $this->state = array_merge($this->state, $this->user->profile->toArray());
            $this->selectedCountry = $this->state['country_of_origin_id'];
            $this->selectedState = $this->state['state_id'];
        }
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
        $data = Validator::make($this->state, $this->userRules($this->user))->validate();
        $this->userArr = $data;
        $this->currentStep = 2;
    }

    public function store(): User
    {
        $user = $this->user;

        $this->validate([
            'selectedCountry' => 'required',
            'selectedState'   => 'required',
            'image'           => 'nullable|image',
        ]);

        Validator::make($this->state, $this->profileDetailsRules())->validate();
        Validator::make($this->state, $this->profilePersonalRules())->validate();
        Validator::make($this->state, $this->profileReligionRules())->validate();
        Validator::make($this->state, $this->profileEducationRules())->validate();
        Validator::make($this->state, $this->profileLifestyleRules())->validate();
        Validator::make($this->state, $this->profileShapeRules())->validate();
        Validator::make($this->state, $this->profileSocialRules())->validate();

        $this->userArr['username'] = Str::slug($this->userArr['username']);
        $this->userArr['password'] = bcrypt($this->userArr['password']);

        if ($this->image) {
            /** @var \Illuminate\Http\UploadedFile */
            $image = $this->image;
            if (!is_null($this->user)) {
                if ($this->user->avatar != 'images/users-avatar/default.png') {
                    Storage::delete($user->avatar);
                }
            }
            $imageName = $image->store('images/users-avatar');
        }

        try {
            DB::beginTransaction();

            if (is_null($this->user)) {
                $this->user = User::create($this->userArr);
                $this->user->profile()->create();
                $user = $this->user;
            }

            $user->update([
                'avatar' => $imageName
            ]);

            $this->user->update($this->userArr);

            $user->profile->update([
                'country_of_origin_id' => $this->selectedCountry,
            ]);

            $user->profile->update(Arr::except($this->state, [
                'name', 'gender', 'email', 'password', 'username', 'phone', 'password_confirmation',
                'avatar'
            ]));

            $this->state = [];
            $this->currentStep = 1;

            DB::commit();

            return $user;
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}
