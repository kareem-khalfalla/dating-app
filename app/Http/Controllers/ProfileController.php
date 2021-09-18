<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public ?User $authUser = null;

    public function __construct()
    {
        $this->authUser = auth()->user();
    }

    public function index(User $user): View
    {
        return view('pages.profiles.index', [
            'user' => $user
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

    public function friends(User $user): View
    {
        return view('pages.friends', [
            'friends' => $user->getFriends()
        ]);
    }

    public function remove(User $user): RedirectResponse
    {
        $this->authUser->unfriend($user);
        return back();
    }

    public function block(User $user): RedirectResponse
    {
        $this->authUser->blockFriend($user);
        return back();
    }

    public function friendRequest(User $user): RedirectResponse
    {
        $this->authUser->befriend(User::find($user['id']));
        return back();
    }

    public function report(User $user): RedirectResponse
    {
        $user->update([
            'report_count' => $user->report_count++
        ]);

        return back();
    }
}
