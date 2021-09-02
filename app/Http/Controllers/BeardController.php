<?php

namespace App\Http\Controllers;

use App\Models\Beard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BeardController extends Controller
{
    public function index(): View
    {
        return view('beards.index', [
            'beards' => Beard::all(),
        ]);
    }

    public function create(): View
    {
        return view('beards.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Beard::create($request->all());
        return redirect()->route('beards.index');
    }

    public function show(Beard $beard): View
    {
        return view('beards.show', [
            'beard' => $beard
        ]);
    }

    public function edit(Beard $beard): View
    {
        return view('beards.edit', [
            'beard' => $beard,
        ]);
    }

    public function update(Request $request, Beard $beard): RedirectResponse
    {
        $beard->update($request->all());
        return redirect()->route('beards.index');
    }

    public function destroy(Beard $beard): RedirectResponse
    {
        $beard->delete();
        return redirect()->route('beards.index');
    }
}