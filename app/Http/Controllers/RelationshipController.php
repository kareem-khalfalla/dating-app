<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index(): View
    {
        return view('relationships.index', [
            'relationships' => Relationship::all(),
        ]);
    }

    public function create(): View
    {
        return view('relationships.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Relationship::create($request->all());
        return redirect()->route('relationships.index');
    }

    public function show(Relationship $relationship): View
    {
        return view('relationships.show', [
            'relationship' => $relationship
        ]);
    }

    public function edit(Relationship $relationship): View
    {
        return view('relationships.edit', [
            'relationship' => $relationship,
        ]);
    }

    public function update(Request $request, Relationship $relationship): RedirectResponse
    {
        $relationship->update($request->all());
        return redirect()->route('relationships.index');
    }

    public function destroy(Relationship $relationship): RedirectResponse
    {
        $relationship->delete();
        return redirect()->route('relationships.index');
    }
}