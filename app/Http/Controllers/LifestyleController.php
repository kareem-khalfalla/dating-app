<?php

namespace App\Http\Controllers;

use App\Models\Lifestyle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LifestyleController extends Controller
{
    public function index(): View
    {
        return view('lifestyles.index', [
            'lifestyles' => Lifestyle::all(),
        ]);
    }

    public function create(): View
    {
        return view('lifestyles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Lifestyle::create($request->all());
        return redirect()->route('lifestyles.index');
    }

    public function show(Lifestyle $lifestyle): View
    {
        return view('lifestyles.show', [
            'lifestyle' => $lifestyle
        ]);
    }

    public function edit(Lifestyle $lifestyle): View
    {
        return view('lifestyles.edit', [
            'lifestyle' => $lifestyle,
        ]);
    }

    public function update(Request $request, Lifestyle $lifestyle): RedirectResponse
    {
        $lifestyle->update($request->all());
        return redirect()->route('lifestyles.index');
    }

    public function destroy(Lifestyle $lifestyle): RedirectResponse
    {
        $lifestyle->delete();
        return redirect()->route('lifestyles.index');
    }
}