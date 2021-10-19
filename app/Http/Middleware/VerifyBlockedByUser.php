<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyBlockedByUser
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
        if($request->user->isBlockedBy($authUser) || $authUser->isBlockedBy($request->user)){
            return redirect()->route('notAllowed')->withError(__('alerts.Sadlly, cannot access this profile while you or this user in the blacklist.'));
        }
        return $next($request);
    }
}
