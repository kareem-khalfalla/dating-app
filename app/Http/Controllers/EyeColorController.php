<?php

namespace App\Http\Controllers;

use App\Models\EyeColor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EyeColorController extends Controller
{
    public function index(): View
    {
        return view('eyeColors.index', [
            'eyeColors' => EyeColor::all(),
        ]);
    }

    public function create(): View
    {
        return view('eyeColors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        EyeColor::create($request->all());
        return redirect()->route('eyeColors.index');
    }

    public function show(EyeColor $eyeColor): View
    {
        return view('eyeColors.show', [
            'eyeColor' => $eyeColor
        ]);
    }

    public function edit(EyeColor $eyeColor): View
    {
        return view('eyeColors.edit', [
            'eyeColor' => $eyeColor,
        ]);
    }

    public function update(Request $request, EyeColor $eyeColor): RedirectResponse
    {
        $eyeColor->update($request->all());
        return redirect()->route('eyeColors.index');
    }

    public function destroy(EyeColor $eyeColor): RedirectResponse
    {
        $eyeColor->delete();
        return redirect()->route('eyeColors.index');
    }
}