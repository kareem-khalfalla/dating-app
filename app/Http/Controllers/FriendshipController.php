<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Contracts\View\View;

class FriendshipController extends Controller
{
    public function index(): View
    {
        $onlyFriendsIds = Friendship::onlyFriends()->get()->pluck('from')->toArray();
        
        return view('pages.friends', [
            'friends' => User::findMany($onlyFriendsIds),
        ]);
    }
}