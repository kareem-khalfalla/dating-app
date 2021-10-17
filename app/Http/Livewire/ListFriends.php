<?php

namespace App\Http\Livewire;

use App\Events\FriendRequestDeniedEvent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListFriends extends Component
{
    public function render(): View
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        return view('livewire.list-friends', [
            'friends' =>  $authUser->getFriends()->paginate(6)
        ]);
    }

    public function deleteUser($id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        if (!$authUser->isFriendWith(User::find($id))) {
            event(new FriendRequestDeniedEvent($authUser, User::find($id)));
        }

        $authUser->unfriend(User::find($id));
    }
}
