<?php

namespace App\Http\Controllers;

use App\Models\Obligation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ObligationController extends Controller
{
    public function index(): View
    {
        return view('obligations.index', [
            'obligations' => Obligation::all(),
        ]);
    }

    public function create(): View
    {
        return view('obligations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Obligation::create($request->all());
        return redirect()->route('obligations.index');
    }

    public function show(Obligation $obligation): View
    {
        return view('obligations.show', [
            'obligation' => $obligation
        ]);
    }

    public function edit(Obligation $obligation): View
    {
        return view('obligations.edit', [
            'obligation' => $obligation,
        ]);
    }

    public function update(Request $request, Obligation $obligation): RedirectResponse
    {
        $obligation->update($request->all());
        return redirect()->route('obligations.index');
    }

    public function destroy(Obligation $obligation): RedirectResponse
    {
        $obligation->delete();
        return redirect()->route('obligations.index');
    }
}