<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function welcome(): View
    {
        return view('pages.welcome', [
            'users' => User::latest()->limit(5)->get()
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

    public function contactStore(ContactUsRequest $request)
    {
        ContactUs::create($request->validated());

        return back()->withSuccess('Your message was sent');
    }
}
