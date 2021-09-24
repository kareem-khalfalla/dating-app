<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProfileActions extends Component
{
    public $user;
    public $isPending;
    public $isFriend;
    public $report;

    public function render(): View
    {
        return view('livewire.profile-actions', [
            'friends' => $this->user->status == 0
                ? User::allExceptAuthId()->fake()->get()->random(rand(0, User::all()->count()))
                : $this->user->getFriends()->allExceptAuthId()->paginate(6)
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

    public function deleteUser($id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->unfriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        $this->success('deleted');
    }

    public function addFriend($id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->befriend(User::find($id));

        $this->dispatchBrowserEvent('hide-form');

        $this->success('request sent');
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
