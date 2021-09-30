<?php

namespace App\Http\Middleware;

use App\Models\Message;
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

        if ($authUser->getFriendsCount() == 0 && $authUser->role == 'user') {
            return redirect()->route('notFound')->withError(__('alerts.Sadlly, you don\'t have friends to chat with'));
        }

        if ($authUser->getFriendsCount() == 0 && $authUser->role == 'admin') {
            return redirect()->route('notFound')->withError(__('alerts.Sadlly, you don\'t have friends to chat with'));
        }
        return $next($request);
    }
}
