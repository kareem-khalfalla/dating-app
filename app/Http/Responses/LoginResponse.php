<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if ($user->role == 'admin') {
            return redirect('admin/dashboard');
        }

        if (!$user->wasRecentlyCreated) {
            return redirect()->route('profile', $user->id);
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(config('fortify.home'));
    }
}
