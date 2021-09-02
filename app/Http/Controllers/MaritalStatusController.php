<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    public function index(): View
    {
        return view('maritalStatuss.index', [
            'maritalStatuss' => MaritalStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('maritalStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        MaritalStatus::create($request->all());
        return redirect()->route('maritalStatuss.index');
    }

    public function show(MaritalStatus $maritalStatus): View
    {
        return view('maritalStatuss.show', [
            'maritalStatus' => $maritalStatus
        ]);
    }

    public function edit(MaritalStatus $maritalStatus): View
    {
        return view('maritalStatuss.edit', [
            'maritalStatus' => $maritalStatus,
        ]);
    }

    public function update(Request $request, MaritalStatus $maritalStatus): RedirectResponse
    {
        $maritalStatus->update($request->all());
        return redirect()->route('maritalStatuss.index');
    }

    public function destroy(MaritalStatus $maritalStatus): RedirectResponse
    {
        $maritalStatus->delete();
        return redirect()->route('maritalStatuss.index');
    }
}