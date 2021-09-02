<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index(): View
    {
        return view('prayers.index', [
            'prayers' => Prayer::all(),
        ]);
    }

    public function create(): View
    {
        return view('prayers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Prayer::create($request->all());
        return redirect()->route('prayers.index');
    }

    public function show(Prayer $prayer): View
    {
        return view('prayers.show', [
            'prayer' => $prayer
        ]);
    }

    public function edit(Prayer $prayer): View
    {
        return view('prayers.edit', [
            'prayer' => $prayer,
        ]);
    }

    public function update(Request $request, Prayer $prayer): RedirectResponse
    {
        $prayer->update($request->all());
        return redirect()->route('prayers.index');
    }

    public function destroy(Prayer $prayer): RedirectResponse
    {
        $prayer->delete();
        return redirect()->route('prayers.index');
    }
}