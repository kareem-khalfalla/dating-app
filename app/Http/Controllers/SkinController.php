<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    public function index(): View
    {
        return view('skins.index', [
            'skins' => Skin::all(),
        ]);
    }

    public function create(): View
    {
        return view('skins.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Skin::create($request->all());
        return redirect()->route('skins.index');
    }

    public function show(Skin $skin): View
    {
        return view('skins.show', [
            'skin' => $skin
        ]);
    }

    public function edit(Skin $skin): View
    {
        return view('skins.edit', [
            'skin' => $skin,
        ]);
    }

    public function update(Request $request, Skin $skin): RedirectResponse
    {
        $skin->update($request->all());
        return redirect()->route('skins.index');
    }

    public function destroy(Skin $skin): RedirectResponse
    {
        $skin->delete();
        return redirect()->route('skins.index');
    }
}