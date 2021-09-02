<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(): View
    {
        return view('countrys.index', [
            'countrys' => Country::all(),
        ]);
    }

    public function create(): View
    {
        return view('countrys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Country::create($request->all());
        return redirect()->route('countrys.index');
    }

    public function show(Country $country): View
    {
        return view('countrys.show', [
            'country' => $country
        ]);
    }

    public function edit(Country $country): View
    {
        return view('countrys.edit', [
            'country' => $country,
        ]);
    }

    public function update(Request $request, Country $country): RedirectResponse
    {
        $country->update($request->all());
        return redirect()->route('countrys.index');
    }

    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();
        return redirect()->route('countrys.index');
    }
}