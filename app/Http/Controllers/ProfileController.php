<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function messageRequest(User $user): RedirectResponse
    {
        event(new MessageRequestEvent($user));

        return back();
    }
}
