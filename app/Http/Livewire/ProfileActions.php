<?php

namespace App\Http\Livewire;

use App\Events\FriendRequestDeniedEvent;
use App\Events\FriendRequestSentEvent;
use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class ProfileActions extends Component
{
    public User $user;
    public $isPending;
    public $isFriend;
    public $report;

    public function render(): View
    {
        $pendingIds = $this->user->getPendingFriendships()->pluck('recipient_id')->toArray();
        $getUniqueFromIds = array_unique($pendingIds);
        $authId = auth()->id();
        $allIdsExceptAuthId = array_diff($getUniqueFromIds, [$authId]);

        return view('livewire.profile-actions', [
            'friends' => $this->user->status == 0
                ? User::allExceptAuthId()->fake()->get()->random(rand(0, User::all()->count()))
                : $this->user->getFriends()->allExceptAuthId()->paginate(6),

            'pendingUsers' => User::whereIn('id', $allIdsExceptAuthId)->get()
        ]);
    }

    public function createReport(): void
    {
        $this->validate([
            'report' => ['required', 'string', 'max:1000']
        ]);

        Report::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $this->user->id,
            'reason' => $this->report,
        ]);

        $this->report = '';

        $this->dispatchBrowserEvent('hide-form');

        $this->success('reported');
    }

    public function blockUser($id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->blockFriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        $this->success('blocked');
    }

    public function unblockUser($id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->unblockFriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        $this->success('unblocked');
    }

    public function deleteUser($id): Redirector
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        if (!$authUser->isFriendWith(User::find($id))) {
            event(new FriendRequestDeniedEvent($authUser, User::find($id)));
        }

        $authUser->unfriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        return redirect(request()->header('Referer'));
    }

    public function addFriend($id)
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->befriend(User::find($id));

        event(new FriendRequestSentEvent($authUser, User::find($id)));
    }

    public function acceptFriendRequest($id)
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->acceptFriendRequest(User::find($id));
    }

    public function success(string $status = ''): void
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => __("alerts.User $status successfully"),
            'timer' => 2000,
            'text' => '',
        ]);
    }
}
