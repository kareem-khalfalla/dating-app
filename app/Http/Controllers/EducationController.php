<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(): View
    {
        return view('educations.index', [
            'educations' => Education::all(),
        ]);
    }

    public function create(): View
    {
        return view('educations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Education::create($request->all());
        return redirect()->route('educations.index');
    }

    public function show(Education $education): View
    {
        return view('educations.show', [
            'education' => $education
        ]);
    }

    public function edit(Education $education): View
    {
        return view('educations.edit', [
            'education' => $education,
        ]);
    }

    public function update(Request $request, Education $education): RedirectResponse
    {
        $education->update($request->all());
        return redirect()->route('educations.index');
    }

    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();
        return redirect()->route('educations.index');
    }
}