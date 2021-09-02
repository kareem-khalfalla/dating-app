<?php

namespace App\Http\Controllers;

use App\Models\Robe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RobeController extends Controller
{
    public function index(): View
    {
        return view('robes.index', [
            'robes' => Robe::all(),
        ]);
    }

    public function create(): View
    {
        return view('robes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Robe::create($request->all());
        return redirect()->route('robes.index');
    }

    public function show(Robe $robe): View
    {
        return view('robes.show', [
            'robe' => $robe
        ]);
    }

    public function edit(Robe $robe): View
    {
        return view('robes.edit', [
            'robe' => $robe,
        ]);
    }

    public function update(Request $request, Robe $robe): RedirectResponse
    {
        $robe->update($request->all());
        return redirect()->route('robes.index');
    }

    public function destroy(Robe $robe): RedirectResponse
    {
        $robe->delete();
        return redirect()->route('robes.index');
    }
}