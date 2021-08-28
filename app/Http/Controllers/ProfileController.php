<?php

namespace App\Http\Controllers;

use App\Events\MessageRequestEvent;
use App\Events\MessageRequestRefusedEvent;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profiles.index', [
            'profiles' => Profile::all(),
        ]);
    }

    public function create(): View
    {
        return view('profiles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Profile::create($request->all());
        return redirect()->route('profiles.index');
    }

    public function show(User $user): View
    {
        return view('profiles.show', [
            'user' => $user
        ]);
    }

    public function edit(Profile $profile): View
    {
        return view('profiles.edit', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile): RedirectResponse
    {
        $profile->update($request->all());
        return redirect()->route('profiles.index');
    }

    public function destroy(Profile $profile): RedirectResponse
    {
        $profile->delete();
        return redirect()->route('profiles.index');
    }

    public function messageRequest(User $user): RedirectResponse
    {
        event(new MessageRequestEvent($user));
        
        return redirect()->back();
    }

    public function messageRequestRefused(User $user): RedirectResponse
    {
        event(new MessageRequestRefusedEvent($user));
        
        return redirect()->back();
    }
}