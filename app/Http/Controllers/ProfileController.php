<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function index(User $user): View
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = app('router');
        $isAdmin = $router->getRoutes()->match(request()->create(URL::previous()))->getName() == 'admin.users';
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        $isPending = in_array($user->id, $authUser->getPendingFriendships()->pluck('recipient_id')->toArray());
        $isFriend = $authUser->isFriendWith($user);

        return view('pages.profiles.index', [
            'user' => $user,
            'isPending' => $isPending,
            'isFriend' => $isFriend,
            'isAdmin' => $isAdmin
        ]);
    }

    public function edit(User $user): View
    {
        return view('pages.profiles.edit', [
            'user' => $user,
        ]);
    }
}
