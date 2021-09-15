<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\View;

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
        return view('pages.chat', [

            'users' => User::allExceptAuthId()->orderByMessages()->get()
        ]);
    }
}
