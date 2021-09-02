<?php

namespace App\Http\Controllers;

use App\Models\CountryOfResidence;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CountryOfResidenceController extends Controller
{
    public function index(): View
    {
        return view('countryOfResidences.index', [
            'countryOfResidences' => CountryOfResidence::all(),
        ]);
    }

    public function create(): View
    {
        return view('countryOfResidences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        CountryOfResidence::create($request->all());
        return redirect()->route('countryOfResidences.index');
    }

    public function show(CountryOfResidence $countryOfResidence): View
    {
        return view('countryOfResidences.show', [
            'countryOfResidence' => $countryOfResidence
        ]);
    }

    public function edit(CountryOfResidence $countryOfResidence): View
    {
        return view('countryOfResidences.edit', [
            'countryOfResidence' => $countryOfResidence,
        ]);
    }

    public function update(Request $request, CountryOfResidence $countryOfResidence): RedirectResponse
    {
        $countryOfResidence->update($request->all());
        return redirect()->route('countryOfResidences.index');
    }

    public function destroy(CountryOfResidence $countryOfResidence): RedirectResponse
    {
        $countryOfResidence->delete();
        return redirect()->route('countryOfResidences.index');
    }
}