<?php

namespace App\Http\Controllers;

use App\Models\LanguagePerfection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguagePerfectionController extends Controller
{
    public function index(): View
    {
        return view('languagePerfections.index', [
            'languagePerfections' => LanguagePerfection::all(),
        ]);
    }

    public function create(): View
    {
        return view('languagePerfections.create');
    }

    public function store(Request $request): RedirectResponse
    {
        LanguagePerfection::create($request->all());
        return redirect()->route('languagePerfections.index');
    }

    public function show(LanguagePerfection $languagePerfection): View
    {
        return view('languagePerfections.show', [
            'languagePerfection' => $languagePerfection
        ]);
    }

    public function edit(LanguagePerfection $languagePerfection): View
    {
        return view('languagePerfections.edit', [
            'languagePerfection' => $languagePerfection,
        ]);
    }

    public function update(Request $request, LanguagePerfection $languagePerfection): RedirectResponse
    {
        $languagePerfection->update($request->all());
        return redirect()->route('languagePerfections.index');
    }

    public function destroy(LanguagePerfection $languagePerfection): RedirectResponse
    {
        $languagePerfection->delete();
        return redirect()->route('languagePerfections.index');
    }
}