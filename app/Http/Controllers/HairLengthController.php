<?php

namespace App\Http\Controllers;

use App\Models\HairLength;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HairLengthController extends Controller
{
    public function index(): View
    {
        return view('hairLengths.index', [
            'hairLengths' => HairLength::all(),
        ]);
    }

    public function create(): View
    {
        return view('hairLengths.create');
    }

    public function store(Request $request): RedirectResponse
    {
        HairLength::create($request->all());
        return redirect()->route('hairLengths.index');
    }

    public function show(HairLength $hairLength): View
    {
        return view('hairLengths.show', [
            'hairLength' => $hairLength
        ]);
    }

    public function edit(HairLength $hairLength): View
    {
        return view('hairLengths.edit', [
            'hairLength' => $hairLength,
        ]);
    }

    public function update(Request $request, HairLength $hairLength): RedirectResponse
    {
        $hairLength->update($request->all());
        return redirect()->route('hairLengths.index');
    }

    public function destroy(HairLength $hairLength): RedirectResponse
    {
        $hairLength->delete();
        return redirect()->route('hairLengths.index');
    }
}