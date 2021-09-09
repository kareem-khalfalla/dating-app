<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function requests(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return view('pages.requests', [
            'user' => $user
        ]);
    }

    public function filter(): View
    {
        return view('pages.results');
    }
}