<?php

namespace App\Http\Controllers;

use App\Models\HairColor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HairColorController extends Controller
{
    public function index(): View
    {
        return view('hairColors.index', [
            'hairColors' => HairColor::all(),
        ]);
    }

    public function create(): View
    {
        return view('hairColors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        HairColor::create($request->all());
        return redirect()->route('hairColors.index');
    }

    public function show(HairColor $hairColor): View
    {
        return view('hairColors.show', [
            'hairColor' => $hairColor
        ]);
    }

    public function edit(HairColor $hairColor): View
    {
        return view('hairColors.edit', [
            'hairColor' => $hairColor,
        ]);
    }

    public function update(Request $request, HairColor $hairColor): RedirectResponse
    {
        $hairColor->update($request->all());
        return redirect()->route('hairColors.index');
    }

    public function destroy(HairColor $hairColor): RedirectResponse
    {
        $hairColor->delete();
        return redirect()->route('hairColors.index');
    }
}