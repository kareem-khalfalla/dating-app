<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(): View
    {
        return view('languages.index', [
            'languages' => Language::all(),
        ]);
    }

    public function create(): View
    {
        return view('languages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Language::create($request->all());
        return redirect()->route('languages.index');
    }

    public function show(Language $language): View
    {
        return view('languages.show', [
            'language' => $language
        ]);
    }

    public function edit(Language $language): View
    {
        return view('languages.edit', [
            'language' => $language,
        ]);
    }

    public function update(Request $request, Language $language): RedirectResponse
    {
        $language->update($request->all());
        return redirect()->route('languages.index');
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();
        return redirect()->route('languages.index');
    }
}