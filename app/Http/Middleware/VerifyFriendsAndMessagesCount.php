<?php

namespace App\Http\Middleware;

use App\Models\Message;
use Closure;
use Illuminate\Http\Request;

class VerifyFriendsAndMessagesCount
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

        $messagesCount = Message::query()
            ->where('to', $authUser->id)->orWhere('from', $authUser->id)->count();

        if ($authUser->getFriendsCount() == 0 && $messagesCount < 1 && $authUser->role == 'user' || $authUser->role == 'admin') {
            return redirect()->route('notAllowed')->withError(__('alerts.Sadlly, you don\'t have friends to chat with'));
        }

        return $next($request);
    }
}
