<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function welcome(): View
    {
        return view('pages.welcome', [
            'users' => User::with('profile.nationality')
                ->with('profile.countryOfResidence')
                ->with('profile.countryOfOrigin')
                ->latest()->limit(10)->get()
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function chat(): View
    {
        return view('pages.chat');
    }

    public function friends(): View
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();

        return view('pages.friends', [
            'friends' => $authUser->getFriends()->paginate(6)
        ]);
    }

    public function notFound(): View
    {
        return view('pages.not_found');
    }

    public function contactStore(ContactUsRequest $request)
    {
        ContactUs::create($request->validated());

        return redirect()->route('welcome')->withSuccess(__('alerts.Your message was sent'));
    }
}
