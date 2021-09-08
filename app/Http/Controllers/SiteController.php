<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function welcome(): View
    {
        return view('welcome', [
            'users' => User::latest()->limit(5)->get()
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function privacy(): View
    {
        return view('privacy');
    }
}
