<?php

namespace App\Http\Livewire;

use App\Events\FriendRequestAcceptedEvent;
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
    public $friendsCount;
    public $pendingUsersCount;
    public $blockedUsersCount;
    public $loadAmount = 15;

    public function render(): View
    {
        $pendingIds = $this->user->getPendingFriendships()->pluck('recipient_id')->toArray();
        $getUniqueFromIds = array_unique($pendingIds);
        $authId = auth()->id();

        $allIdsExceptAuthId = array_diff($getUniqueFromIds, [$authId]);

        $this->friendsCount = $this->user->getFriends()->allExceptAuthId()->count();
        $this->pendingUsersCount = User::whereIn('id', $allIdsExceptAuthId)->count();
        $this->blockedUsersCount = User::find($authId)->getBlockedFriendships()->whereNotIn('recipient_id', [$authId])->count();

        return view('livewire.profile-actions', [
            'friends' => $this->user->getFriends()->allExceptAuthId()->paginate($this->loadAmount),
            'pendingUsers' => User::whereIn('id', $allIdsExceptAuthId)->paginate($this->loadAmount),
            'blockedUsers' => User::find($authId)->getBlockedFriendships()->whereNotIn('recipient_id', [$authId])->paginate($this->loadAmount),
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

        $notIn = auth()->user()->getPendingFriendships()->where('sender_id')->pluck('recipient_id')->toArray();

        if (!$authUser->isFriendWith(User::find($id)) && !in_array($id, $notIn)) {
            event(new FriendRequestDeniedEvent($authUser, User::find($id)));
        }

        $authUser->unfriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        return redirect(request()->header('Referer'));
    }

    public function addFriend($id): Redirector
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->befriend(User::find($id));

        event(new FriendRequestSentEvent($authUser, User::find($id)));

        $this->dispatchBrowserEvent('hide-form');

        return redirect(request()->header('Referer'));
    }

    public function acceptFriendRequest($id): Redirector
    {
        $this->isPending = false;
        $this->isFriend = true;

        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->acceptFriendRequest(User::find($id));

        event(new FriendRequestAcceptedEvent($authUser, User::find($id)));

        return redirect(request()->header('Referer'));
    }

    public function loadMore()
    {
        if ($this->loadAmount >= User::count()) {
            return;
        }
        $this->loadAmount += 15;
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
