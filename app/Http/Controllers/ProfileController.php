<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

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
}
