<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index(): View
    {
        return view('healths.index', [
            'healths' => Health::all(),
        ]);
    }

    public function create(): View
    {
        return view('healths.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Health::create($request->all());
        return redirect()->route('healths.index');
    }

    public function show(Health $health): View
    {
        return view('healths.show', [
            'health' => $health
        ]);
    }

    public function edit(Health $health): View
    {
        return view('healths.edit', [
            'health' => $health,
        ]);
    }

    public function update(Request $request, Health $health): RedirectResponse
    {
        $health->update($request->all());
        return redirect()->route('healths.index');
    }

    public function destroy(Health $health): RedirectResponse
    {
        $health->delete();
        return redirect()->route('healths.index');
    }
}