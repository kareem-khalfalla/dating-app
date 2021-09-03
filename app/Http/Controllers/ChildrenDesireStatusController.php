<?php

namespace App\Http\Controllers;

use App\Models\ChildrenDesireStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChildrenDesireStatusController extends Controller
{
    public function index(): View
    {
        return view('childrenDesireStatuss.index', [
            'childrenDesireStatuss' => ChildrenDesireStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('childrenDesireStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ChildrenDesireStatus::create($request->all());
        return redirect()->route('childrenDesireStatuss.index');
    }

    public function show(ChildrenDesireStatus $childrenDesireStatus): View
    {
        return view('childrenDesireStatuss.show', [
            'childrenDesireStatus' => $childrenDesireStatus
        ]);
    }

    public function edit(ChildrenDesireStatus $childrenDesireStatus): View
    {
        return view('childrenDesireStatuss.edit', [
            'childrenDesireStatus' => $childrenDesireStatus,
        ]);
    }

    public function update(Request $request, ChildrenDesireStatus $childrenDesireStatus): RedirectResponse
    {
        $childrenDesireStatus->update($request->all());
        return redirect()->route('childrenDesireStatuss.index');
    }

    public function destroy(ChildrenDesireStatus $childrenDesireStatus): RedirectResponse
    {
        $childrenDesireStatus->delete();
        return redirect()->route('childrenDesireStatuss.index');
    }
}