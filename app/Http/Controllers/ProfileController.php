<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user): View
    {
        return view('pages.profiles.index', [
            'user' => $user,
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

    public function friendRequest(User $user): JsonResponse
    {
        /** @var \App\Models\User $authUser */
        $authUser = Auth::user();

        return $authUser->addFriend($user->id);
    }
}
