<?php

namespace App\Http\Controllers;

use App\Models\Marriage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MarriageController extends Controller
{
    public function index(): View
    {
        return view('marriages.index', [
            'marriages' => Marriage::all(),
        ]);
    }

    public function create(): View
    {
        return view('marriages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Marriage::create($request->all());
        return redirect()->route('marriages.index');
    }

    public function show(Marriage $marriage): View
    {
        return view('marriages.show', [
            'marriage' => $marriage
        ]);
    }

    public function edit(Marriage $marriage): View
    {
        return view('marriages.edit', [
            'marriage' => $marriage,
        ]);
    }

    public function update(Request $request, Marriage $marriage): RedirectResponse
    {
        $marriage->update($request->all());
        return redirect()->route('marriages.index');
    }

    public function destroy(Marriage $marriage): RedirectResponse
    {
        $marriage->delete();
        return redirect()->route('marriages.index');
    }
}