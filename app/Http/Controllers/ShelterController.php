<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function index(): View
    {
        return view('shelters.index', [
            'shelters' => Shelter::all(),
        ]);
    }

    public function create(): View
    {
        return view('shelters.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Shelter::create($request->all());
        return redirect()->route('shelters.index');
    }

    public function show(Shelter $shelter): View
    {
        return view('shelters.show', [
            'shelter' => $shelter
        ]);
    }

    public function edit(Shelter $shelter): View
    {
        return view('shelters.edit', [
            'shelter' => $shelter,
        ]);
    }

    public function update(Request $request, Shelter $shelter): RedirectResponse
    {
        $shelter->update($request->all());
        return redirect()->route('shelters.index');
    }

    public function destroy(Shelter $shelter): RedirectResponse
    {
        $shelter->delete();
        return redirect()->route('shelters.index');
    }
}