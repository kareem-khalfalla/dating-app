<?php

namespace App\Http\Livewire;

use App\Models\ContactUs;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ContactUsComponent extends Component
{
    public $state = [];

    public function render(): View
    {
        return view('livewire.contact-us-component');
    }

    public function submit(): void
    {
        Validator::make($this->state, [
            'name' => ['required', 'string' , 'max:255', 'min:3'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:6', 'max:1000'],
        ])->validate();

        ContactUs::create([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'message' => $this->state['message'],
        ]);

        session()->flash('success', 'Your message is sent successfully');

        $this->state['name'] = null;
        $this->state['email'] = null;
        $this->state['message'] = null;
    }
}
