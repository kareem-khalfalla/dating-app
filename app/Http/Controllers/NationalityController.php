<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index(): View
    {
        return view('nationalitys.index', [
            'nationalitys' => Nationality::all(),
        ]);
    }

    public function create(): View
    {
        return view('nationalitys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Nationality::create($request->all());
        return redirect()->route('nationalitys.index');
    }

    public function show(Nationality $nationality): View
    {
        return view('nationalitys.show', [
            'nationality' => $nationality
        ]);
    }

    public function edit(Nationality $nationality): View
    {
        return view('nationalitys.edit', [
            'nationality' => $nationality,
        ]);
    }

    public function update(Request $request, Nationality $nationality): RedirectResponse
    {
        $nationality->update($request->all());
        return redirect()->route('nationalitys.index');
    }

    public function destroy(Nationality $nationality): RedirectResponse
    {
        $nationality->delete();
        return redirect()->route('nationalitys.index');
    }
}