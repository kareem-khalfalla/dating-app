<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function index(): View
    {
        return view('religions.index', [
            'religions' => Religion::all(),
        ]);
    }

    public function create(): View
    {
        return view('religions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Religion::create($request->all());
        return redirect()->route('religions.index');
    }

    public function show(Religion $religion): View
    {
        return view('religions.show', [
            'religion' => $religion
        ]);
    }

    public function edit(Religion $religion): View
    {
        return view('religions.edit', [
            'religion' => $religion,
        ]);
    }

    public function update(Request $request, Religion $religion): RedirectResponse
    {
        $religion->update($request->all());
        return redirect()->route('religions.index');
    }

    public function destroy(Religion $religion): RedirectResponse
    {
        $religion->delete();
        return redirect()->route('religions.index');
    }
}