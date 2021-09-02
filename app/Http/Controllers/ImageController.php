<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('images.index', [
            'images' => Image::all(),
        ]);
    }

    public function create(): View
    {
        return view('images.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Image::create($request->all());
        return redirect()->route('images.index');
    }

    public function show(Image $image): View
    {
        return view('images.show', [
            'image' => $image
        ]);
    }

    public function edit(Image $image): View
    {
        return view('images.edit', [
            'image' => $image,
        ]);
    }

    public function update(Request $request, Image $image): RedirectResponse
    {
        $image->update($request->all());
        return redirect()->route('images.index');
    }

    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();
        return redirect()->route('images.index');
    }
}