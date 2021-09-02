<?php

namespace App\Http\Controllers;

use App\Models\PsychologicalPattern;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PsychologicalPatternController extends Controller
{
    public function index(): View
    {
        return view('psychologicalPatterns.index', [
            'psychologicalPatterns' => PsychologicalPattern::all(),
        ]);
    }

    public function create(): View
    {
        return view('psychologicalPatterns.create');
    }

    public function store(Request $request): RedirectResponse
    {
        PsychologicalPattern::create($request->all());
        return redirect()->route('psychologicalPatterns.index');
    }

    public function show(PsychologicalPattern $psychologicalPattern): View
    {
        return view('psychologicalPatterns.show', [
            'psychologicalPattern' => $psychologicalPattern
        ]);
    }

    public function edit(PsychologicalPattern $psychologicalPattern): View
    {
        return view('psychologicalPatterns.edit', [
            'psychologicalPattern' => $psychologicalPattern,
        ]);
    }

    public function update(Request $request, PsychologicalPattern $psychologicalPattern): RedirectResponse
    {
        $psychologicalPattern->update($request->all());
        return redirect()->route('psychologicalPatterns.index');
    }

    public function destroy(PsychologicalPattern $psychologicalPattern): RedirectResponse
    {
        $psychologicalPattern->delete();
        return redirect()->route('psychologicalPatterns.index');
    }
}