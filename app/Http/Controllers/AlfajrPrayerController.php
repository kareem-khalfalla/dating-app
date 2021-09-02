<?php

namespace App\Http\Controllers;

use App\Models\AlfajrPrayer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlfajrPrayerController extends Controller
{
    public function index(): View
    {
        return view('alfajrPrayers.index', [
            'alfajrPrayers' => AlfajrPrayer::all(),
        ]);
    }

    public function create(): View
    {
        return view('alfajrPrayers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        AlfajrPrayer::create($request->all());
        return redirect()->route('alfajrPrayers.index');
    }

    public function show(AlfajrPrayer $alfajrPrayer): View
    {
        return view('alfajrPrayers.show', [
            'alfajrPrayer' => $alfajrPrayer
        ]);
    }

    public function edit(AlfajrPrayer $alfajrPrayer): View
    {
        return view('alfajrPrayers.edit', [
            'alfajrPrayer' => $alfajrPrayer,
        ]);
    }

    public function update(Request $request, AlfajrPrayer $alfajrPrayer): RedirectResponse
    {
        $alfajrPrayer->update($request->all());
        return redirect()->route('alfajrPrayers.index');
    }

    public function destroy(AlfajrPrayer $alfajrPrayer): RedirectResponse
    {
        $alfajrPrayer->delete();
        return redirect()->route('alfajrPrayers.index');
    }
}