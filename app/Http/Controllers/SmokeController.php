<?php

namespace App\Http\Controllers;

use App\Models\Smoke;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SmokeController extends Controller
{
    public function index(): View
    {
        return view('smokes.index', [
            'smokes' => Smoke::all(),
        ]);
    }

    public function create(): View
    {
        return view('smokes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Smoke::create($request->all());
        return redirect()->route('smokes.index');
    }

    public function show(Smoke $smoke): View
    {
        return view('smokes.show', [
            'smoke' => $smoke
        ]);
    }

    public function edit(Smoke $smoke): View
    {
        return view('smokes.edit', [
            'smoke' => $smoke,
        ]);
    }

    public function update(Request $request, Smoke $smoke): RedirectResponse
    {
        $smoke->update($request->all());
        return redirect()->route('smokes.index');
    }

    public function destroy(Smoke $smoke): RedirectResponse
    {
        $smoke->delete();
        return redirect()->route('smokes.index');
    }
}