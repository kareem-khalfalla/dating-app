<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearchByNameComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $usersResults;

    public function render(): View
    {
        if ($this->usersResults == null) {
            $this->usersResults = collect();
        }

        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $pendingSenderIds = $authUser->getPendingFriendships()->pluck('sender_id');
        $pendingRecipientIds = $authUser->getPendingFriendships()->pluck('recipient_id');
        $blockedRecipientIds = $authUser->getBlockedFriendships()->pluck('recipient_id');
        $allPendingIds = $pendingSenderIds
            ->merge($pendingRecipientIds)
            ->merge($blockedRecipientIds);

        return view('livewire.user-search-by-name-component', [
            'users' => User::swapGender()->allExceptAuthName($this->search)->get()
                ->merge($this->usersResults)
                ->diff(User::findMany($allPendingIds))
                ->diff($authUser->getFriends()->get())
                ->diff(User::ignoreDenied()->get())
                ->paginate(6)
        ]);
    }

    public function add(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->befriend(User::find($id));
    }
}
