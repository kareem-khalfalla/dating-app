<?php

namespace App\Http\Controllers;

use App\Models\Relocate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RelocateController extends Controller
{
    public function index(): View
    {
        return view('relocates.index', [
            'relocates' => Relocate::all(),
        ]);
    }

    public function create(): View
    {
        return view('relocates.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Relocate::create($request->all());
        return redirect()->route('relocates.index');
    }

    public function show(Relocate $relocate): View
    {
        return view('relocates.show', [
            'relocate' => $relocate
        ]);
    }

    public function edit(Relocate $relocate): View
    {
        return view('relocates.edit', [
            'relocate' => $relocate,
        ]);
    }

    public function update(Request $request, Relocate $relocate): RedirectResponse
    {
        $relocate->update($request->all());
        return redirect()->route('relocates.index');
    }

    public function destroy(Relocate $relocate): RedirectResponse
    {
        $relocate->delete();
        return redirect()->route('relocates.index');
    }
}