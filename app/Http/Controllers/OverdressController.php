<?php

namespace App\Http\Controllers;

use App\Models\Overdress;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OverdressController extends Controller
{
    public function index(): View
    {
        return view('overdresss.index', [
            'overdresss' => Overdress::all(),
        ]);
    }

    public function create(): View
    {
        return view('overdresss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Overdress::create($request->all());
        return redirect()->route('overdresss.index');
    }

    public function show(Overdress $overdress): View
    {
        return view('overdresss.show', [
            'overdress' => $overdress
        ]);
    }

    public function edit(Overdress $overdress): View
    {
        return view('overdresss.edit', [
            'overdress' => $overdress,
        ]);
    }

    public function update(Request $request, Overdress $overdress): RedirectResponse
    {
        $overdress->update($request->all());
        return redirect()->route('overdresss.index');
    }

    public function destroy(Overdress $overdress): RedirectResponse
    {
        $overdress->delete();
        return redirect()->route('overdresss.index');
    }
}