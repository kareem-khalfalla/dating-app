<?php

namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Http\Request;

class TrackerUser
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
        $tracker = Tracker::where('ip', request()->ip())->first();
        
        if (is_null($tracker)) {
            Tracker::create([
                'ip' => request()->ip(),
                'date' => now(),
            ]);
        }

        return $next($request);
    }
}
