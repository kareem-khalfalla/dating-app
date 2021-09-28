<?php

namespace App\Http\Livewire\Admin\Users;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateUser extends Component
{
    public int $currentStep = 1;

    public array $state = [];

    public $selectedCountry;
    public $countryStates;

    public function render()
    {
        return view('livewire.admin.users.create-user')->layout('layouts.admin');
    }

    public function nextStep(): void
    {
        Validator::make($this->state, [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone'    => ['required', 'string', 'max:255', 'unique:users'],
            'gender'   => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'confirmed'],
        ])->validate();

        $this->currentStep = 2;
    }

    public function store(): void
    {
        dd($this->state);
    }
}
