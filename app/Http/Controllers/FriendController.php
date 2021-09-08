<?php

namespace App\Http\Controllers;

use App\Models\friends;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index(): View
    {
        return view('pages.friends.index', [
            // 
        ]);
    }

    public function create(): View
    {
        return view('pages.friends.create');
    }

    public function store(Request $request): RedirectResponse
    {
        friends::create($request->all());
        return redirect()->route('friends.index');
    }

    public function show(friends $friends): View
    {
        return view('pages.friends.show', [
            'friends' => $friends
        ]);
    }

    public function edit(friends $friends): View
    {
        return view('pages.friends.edit', [
            'friends' => $friends,
        ]);
    }

    public function update(Request $request, friends $friends): RedirectResponse
    {
        $friends->update($request->all());
        return redirect()->route('friends.index');
    }

    public function destroy(friends $friends): RedirectResponse
    {
        $friends->delete();
        return redirect()->route('friends.index');
    }
}