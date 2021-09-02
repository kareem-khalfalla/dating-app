<?php

namespace App\Http\Controllers;

use App\Models\ShelterWay;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShelterWayController extends Controller
{
    public function index(): View
    {
        return view('shelterWays.index', [
            'shelterWays' => ShelterWay::all(),
        ]);
    }

    public function create(): View
    {
        return view('shelterWays.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ShelterWay::create($request->all());
        return redirect()->route('shelterWays.index');
    }

    public function show(ShelterWay $shelterWay): View
    {
        return view('shelterWays.show', [
            'shelterWay' => $shelterWay
        ]);
    }

    public function edit(ShelterWay $shelterWay): View
    {
        return view('shelterWays.edit', [
            'shelterWay' => $shelterWay,
        ]);
    }

    public function update(Request $request, ShelterWay $shelterWay): RedirectResponse
    {
        $shelterWay->update($request->all());
        return redirect()->route('shelterWays.index');
    }

    public function destroy(ShelterWay $shelterWay): RedirectResponse
    {
        $shelterWay->delete();
        return redirect()->route('shelterWays.index');
    }
}