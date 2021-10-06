<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        dd($request->file('image')->store('images/users-avatar'));
    }
}
