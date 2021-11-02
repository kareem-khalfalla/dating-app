<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyReportCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && count(auth()->user()->reports->unique('sender_id')) >= 3) {
            auth()->user()->update([
                'status' => 0
            ]);

        //     $randomFakeUsersToBeFriends = User::allExceptAuthId()->fake()->inRandomOrder()->get()->random(rand(1, User::allExceptAuthId()->fake()->count()))->take(5);
        //     $randomFakeUsersToBeFriends->map(function ($item) use($authUser) {
        //         $authUser->befriend($item);
        //         // $authUser->blockFriend($item);
        //         // $item->befriend($authUser);
        //         // $authUser->acceptFriendRequest($item);
        //     });
        }
        return $next($request);
    }
}
