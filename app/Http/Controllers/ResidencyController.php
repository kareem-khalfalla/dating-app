<?php

namespace App\Http\Controllers;

use App\Models\Residency;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResidencyController extends Controller
{
    public function index(): View
    {
        return view('residencys.index', [
            'residencys' => Residency::all(),
        ]);
    }

    public function create(): View
    {
        return view('residencys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Residency::create($request->all());
        return redirect()->route('residencys.index');
    }

    public function show(Residency $residency): View
    {
        return view('residencys.show', [
            'residency' => $residency
        ]);
    }

    public function edit(Residency $residency): View
    {
        return view('residencys.edit', [
            'residency' => $residency,
        ]);
    }

    public function update(Request $request, Residency $residency): RedirectResponse
    {
        $residency->update($request->all());
        return redirect()->route('residencys.index');
    }

    public function destroy(Residency $residency): RedirectResponse
    {
        $residency->delete();
        return redirect()->route('residencys.index');
    }
}