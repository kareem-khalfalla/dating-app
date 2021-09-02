<?php

namespace App\Http\Controllers;

use App\Models\Hometown;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HometownController extends Controller
{
    public function index(): View
    {
        return view('hometowns.index', [
            'hometowns' => Hometown::all(),
        ]);
    }

    public function create(): View
    {
        return view('hometowns.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Hometown::create($request->all());
        return redirect()->route('hometowns.index');
    }

    public function show(Hometown $hometown): View
    {
        return view('hometowns.show', [
            'hometown' => $hometown
        ]);
    }

    public function edit(Hometown $hometown): View
    {
        return view('hometowns.edit', [
            'hometown' => $hometown,
        ]);
    }

    public function update(Request $request, Hometown $hometown): RedirectResponse
    {
        $hometown->update($request->all());
        return redirect()->route('hometowns.index');
    }

    public function destroy(Hometown $hometown): RedirectResponse
    {
        $hometown->delete();
        return redirect()->route('hometowns.index');
    }
}