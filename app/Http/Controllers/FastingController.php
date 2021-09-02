<?php

namespace App\Http\Controllers;

use App\Models\Fasting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FastingController extends Controller
{
    public function index(): View
    {
        return view('fastings.index', [
            'fastings' => Fasting::all(),
        ]);
    }

    public function create(): View
    {
        return view('fastings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Fasting::create($request->all());
        return redirect()->route('fastings.index');
    }

    public function show(Fasting $fasting): View
    {
        return view('fastings.show', [
            'fasting' => $fasting
        ]);
    }

    public function edit(Fasting $fasting): View
    {
        return view('fastings.edit', [
            'fasting' => $fasting,
        ]);
    }

    public function update(Request $request, Fasting $fasting): RedirectResponse
    {
        $fasting->update($request->all());
        return redirect()->route('fastings.index');
    }

    public function destroy(Fasting $fasting): RedirectResponse
    {
        $fasting->delete();
        return redirect()->route('fastings.index');
    }
}