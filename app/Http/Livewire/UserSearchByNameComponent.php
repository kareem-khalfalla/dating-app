<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearchByNameComponent extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.user-search-by-name-component', [
            'users' => User::where('name', 'like', "%{$this->search}%")->simplePaginate(5)
        ]);
    }

    public function hide()
    {
        dd('fire...');
    }
}
