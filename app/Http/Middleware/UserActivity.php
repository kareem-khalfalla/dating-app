<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserActivity
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
        if (auth()->check()) {
            Cache::put('user-online-' . auth()->user()->id, true, now()->addMinute(1));

            User::auth()->update([
                'last_seen' => now()
            ]);
        }

        return $next($request);
    }
}
