<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user): View
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $isPending = in_array($user->id, $authUser->getPendingFriendships()->pluck('recipient_id')->toArray());
        $isFriend = $authUser->isFriendWith($user);

        return view('pages.profiles.index', [
            'user' => $user,
            'isPending' => $isPending,
            'isFriend' => $isFriend,
        ]);
    }

    public function edit(User $user): View
    {
        return view('pages.profiles.edit', [
            'user' => $user,
        ]);
    }

    public function messageRequest(User $user)
    {
        // event(new MessageRequestEvent($user));

        /** @var \App\Models\User $authUser */
        // $authUser = Auth::user();

        // return $authUser->addFriend($user->id);
    }

    public function friendRequest(User $user): RedirectResponse
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $authUser->befriend(User::find($user['id']));
        return back();
    }
}
