<?php

namespace App\Http\Controllers;

use App\Models\HairKind;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HairKindController extends Controller
{
    public function index(): View
    {
        return view('hairKinds.index', [
            'hairKinds' => HairKind::all(),
        ]);
    }

    public function create(): View
    {
        return view('hairKinds.create');
    }

    public function store(Request $request): RedirectResponse
    {
        HairKind::create($request->all());
        return redirect()->route('hairKinds.index');
    }

    public function show(HairKind $hairKind): View
    {
        return view('hairKinds.show', [
            'hairKind' => $hairKind
        ]);
    }

    public function edit(HairKind $hairKind): View
    {
        return view('hairKinds.edit', [
            'hairKind' => $hairKind,
        ]);
    }

    public function update(Request $request, HairKind $hairKind): RedirectResponse
    {
        $hairKind->update($request->all());
        return redirect()->route('hairKinds.index');
    }

    public function destroy(HairKind $hairKind): RedirectResponse
    {
        $hairKind->delete();
        return redirect()->route('hairKinds.index');
    }
}