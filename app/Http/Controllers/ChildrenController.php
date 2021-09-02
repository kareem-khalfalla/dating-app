<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index(): View
    {
        return view('childrens.index', [
            'childrens' => Children::all(),
        ]);
    }

    public function create(): View
    {
        return view('childrens.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Children::create($request->all());
        return redirect()->route('childrens.index');
    }

    public function show(Children $children): View
    {
        return view('childrens.show', [
            'children' => $children
        ]);
    }

    public function edit(Children $children): View
    {
        return view('childrens.edit', [
            'children' => $children,
        ]);
    }

    public function update(Request $request, Children $children): RedirectResponse
    {
        $children->update($request->all());
        return redirect()->route('childrens.index');
    }

    public function destroy(Children $children): RedirectResponse
    {
        $children->delete();
        return redirect()->route('childrens.index');
    }
}