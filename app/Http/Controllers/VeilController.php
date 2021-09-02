<?php

namespace App\Http\Controllers;

use App\Models\Veil;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VeilController extends Controller
{
    public function index(): View
    {
        return view('veils.index', [
            'veils' => Veil::all(),
        ]);
    }

    public function create(): View
    {
        return view('veils.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Veil::create($request->all());
        return redirect()->route('veils.index');
    }

    public function show(Veil $veil): View
    {
        return view('veils.show', [
            'veil' => $veil
        ]);
    }

    public function edit(Veil $veil): View
    {
        return view('veils.edit', [
            'veil' => $veil,
        ]);
    }

    public function update(Request $request, Veil $veil): RedirectResponse
    {
        $veil->update($request->all());
        return redirect()->route('veils.index');
    }

    public function destroy(Veil $veil): RedirectResponse
    {
        $veil->delete();
        return redirect()->route('veils.index');
    }
}