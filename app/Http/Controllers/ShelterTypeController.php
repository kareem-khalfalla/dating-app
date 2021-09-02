<?php

namespace App\Http\Controllers;

use App\Models\ShelterType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShelterTypeController extends Controller
{
    public function index(): View
    {
        return view('shelterTypes.index', [
            'shelterTypes' => ShelterType::all(),
        ]);
    }

    public function create(): View
    {
        return view('shelterTypes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ShelterType::create($request->all());
        return redirect()->route('shelterTypes.index');
    }

    public function show(ShelterType $shelterType): View
    {
        return view('shelterTypes.show', [
            'shelterType' => $shelterType
        ]);
    }

    public function edit(ShelterType $shelterType): View
    {
        return view('shelterTypes.edit', [
            'shelterType' => $shelterType,
        ]);
    }

    public function update(Request $request, ShelterType $shelterType): RedirectResponse
    {
        $shelterType->update($request->all());
        return redirect()->route('shelterTypes.index');
    }

    public function destroy(ShelterType $shelterType): RedirectResponse
    {
        $shelterType->delete();
        return redirect()->route('shelterTypes.index');
    }
}