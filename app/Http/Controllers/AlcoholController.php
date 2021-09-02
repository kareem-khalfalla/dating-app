<?php

namespace App\Http\Controllers;

use App\Models\Alcohol;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlcoholController extends Controller
{
    public function index(): View
    {
        return view('alcohols.index', [
            'alcohols' => Alcohol::all(),
        ]);
    }

    public function create(): View
    {
        return view('alcohols.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Alcohol::create($request->all());
        return redirect()->route('alcohols.index');
    }

    public function show(Alcohol $alcohol): View
    {
        return view('alcohols.show', [
            'alcohol' => $alcohol
        ]);
    }

    public function edit(Alcohol $alcohol): View
    {
        return view('alcohols.edit', [
            'alcohol' => $alcohol,
        ]);
    }

    public function update(Request $request, Alcohol $alcohol): RedirectResponse
    {
        $alcohol->update($request->all());
        return redirect()->route('alcohols.index');
    }

    public function destroy(Alcohol $alcohol): RedirectResponse
    {
        $alcohol->delete();
        return redirect()->route('alcohols.index');
    }
}