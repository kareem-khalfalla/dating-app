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
        $reportsCount = count(auth()->user()->reports->unique('sender_id'));
        if (auth()->check() && $reportsCount >= 3) {
            auth()->user()->update([
                'status' => 0
            ]);
        }
        return $next($request);
    }
}
