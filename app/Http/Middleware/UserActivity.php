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
            /** @var \App\Models\User $user */
            $user = auth()->user();

            Cache::put('user-online-' . $user->id, true, now()->addMinute(1));

            if ($user->last_seen_at < now()->subMinutes(5)) {
                $user->update([
                    'last_seen_at' => now()
                ]);
            }
        }

        return $next($request);
    }
}
