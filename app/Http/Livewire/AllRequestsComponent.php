<?php

namespace App\Http\Livewire;

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
            'requests' => $authUser->getFriendRequests()
        ]);
    }

    public function accept(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->acceptFriendRequest(User::find($id));
    }

    public function deny(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->denyFriendRequest(User::find($id));
    }
}
