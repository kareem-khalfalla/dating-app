<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserSearchByNameComponent extends Component
{
    public $search = '';

    public function render(): View
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $pendingIds = $authUser->getPendingFriendships()->pluck('recipient_id');

        return view('livewire.user-search-by-name-component', [
            'users' => User::allExceptAuthName($this->search)->allExceptAuthId()->get()
                ->diff(User::findMany($pendingIds))
                ->diff($authUser->getFriends())
        ]);
    }

    public function add(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->befriend(User::find($id));
    }
}
