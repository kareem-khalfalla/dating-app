<?php

namespace App\Http\Controllers;

use App\Models\Tafaqah;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TafaqahController extends Controller
{
    public function index(): View
    {
        return view('tafaqahs.index', [
            'tafaqahs' => Tafaqah::all(),
        ]);
    }

    public function create(): View
    {
        return view('tafaqahs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Tafaqah::create($request->all());
        return redirect()->route('tafaqahs.index');
    }

    public function show(Tafaqah $tafaqah): View
    {
        return view('tafaqahs.show', [
            'tafaqah' => $tafaqah
        ]);
    }

    public function edit(Tafaqah $tafaqah): View
    {
        return view('tafaqahs.edit', [
            'tafaqah' => $tafaqah,
        ]);
    }

    public function update(Request $request, Tafaqah $tafaqah): RedirectResponse
    {
        $tafaqah->update($request->all());
        return redirect()->route('tafaqahs.index');
    }

    public function destroy(Tafaqah $tafaqah): RedirectResponse
    {
        $tafaqah->delete();
        return redirect()->route('tafaqahs.index');
    }
}