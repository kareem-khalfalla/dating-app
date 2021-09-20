<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyFriendsCount
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
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        if ($authUser->getFriendsCount() == 0) {
            return back()->withError('Sadlly, you don\'t have friends to chatting with.');
        }
        return $next($request);
    }
}
