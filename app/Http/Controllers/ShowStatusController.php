<?php

namespace App\Http\Controllers;

use App\Models\ShowStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShowStatusController extends Controller
{
    public function index(): View
    {
        return view('showStatuss.index', [
            'showStatuss' => ShowStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('showStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ShowStatus::create($request->all());
        return redirect()->route('showStatuss.index');
    }

    public function show(ShowStatus $showStatus): View
    {
        return view('showStatuss.show', [
            'showStatus' => $showStatus
        ]);
    }

    public function edit(ShowStatus $showStatus): View
    {
        return view('showStatuss.edit', [
            'showStatus' => $showStatus,
        ]);
    }

    public function update(Request $request, ShowStatus $showStatus): RedirectResponse
    {
        $showStatus->update($request->all());
        return redirect()->route('showStatuss.index');
    }

    public function destroy(ShowStatus $showStatus): RedirectResponse
    {
        $showStatus->delete();
        return redirect()->route('showStatuss.index');
    }
}