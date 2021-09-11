<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Models\Friendship;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user): View
    {
        $from = Friendship::all()->pluck('from')->toArray();
        $to = Friendship::all()->pluck('to')->toArray();

        return view('pages.profiles.index', [
            'user' => $user,
            'pending' => in_array($user->id, $to) && in_array(auth()->id(), $from)
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
        $authUser = Auth::user();

        $authUser->addFriend($user->id);

        return back();
    }
}
