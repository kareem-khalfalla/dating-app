<?php

namespace App\Http\Livewire;

use App\Models\Friendship;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearchByNameComponent extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $pendingRequestsIds = Friendship::pendingRequests()->get()->pluck('to')->toArray();

        return view('livewire.user-search-by-name-component', [
            'users' => User::allExceptAuthName(search: "%{$this->search}%")->whereNotIn('id', $pendingRequestsIds)->simplePaginate(5)
        ]);
    }

    public function hide()
    {
        dd('fire...');
    }
}
