<?php

namespace App\Http\Controllers;

use App\Models\ReligionStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReligionStatusController extends Controller
{
    public function index(): View
    {
        return view('religionStatuss.index', [
            'religionStatuss' => ReligionStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('religionStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ReligionStatus::create($request->all());
        return redirect()->route('religionStatuss.index');
    }

    public function show(ReligionStatus $religionStatus): View
    {
        return view('religionStatuss.show', [
            'religionStatus' => $religionStatus
        ]);
    }

    public function edit(ReligionStatus $religionStatus): View
    {
        return view('religionStatuss.edit', [
            'religionStatus' => $religionStatus,
        ]);
    }

    public function update(Request $request, ReligionStatus $religionStatus): RedirectResponse
    {
        $religionStatus->update($request->all());
        return redirect()->route('religionStatuss.index');
    }

    public function destroy(ReligionStatus $religionStatus): RedirectResponse
    {
        $religionStatus->delete();
        return redirect()->route('religionStatuss.index');
    }
}