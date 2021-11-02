<?php

namespace App\Http\Livewire;

use App\Events\FriendRequestAcceptedEvent;
use App\Events\FriendRequestDeniedEvent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AllRequestsComponent extends Component
{
    public function render(): View
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        return view('livewire.all-requests-component', [
            'requests' => $authUser->getFriendRequests()->simplePaginate(6)
        ]);
    }

    public function accept(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->acceptFriendRequest(User::find($id));
        
        event(new FriendRequestAcceptedEvent($authUser, User::find($id)));
    }

    public function deny(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        /** @var \App\Models\User $deniedUser */
        $deniedUser = User::find($id);

        $authUser->denyFriendRequest($deniedUser);

        event(new FriendRequestDeniedEvent($authUser, $deniedUser));
    }
}
