<?php

namespace App\Http\Controllers;

use App\Models\WifeStudyStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WifeStudyStatusController extends Controller
{
    public function index(): View
    {
        return view('wifeStudyStatuss.index', [
            'wifeStudyStatuss' => WifeStudyStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('wifeStudyStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        WifeStudyStatus::create($request->all());
        return redirect()->route('wifeStudyStatuss.index');
    }

    public function show(WifeStudyStatus $wifeStudyStatus): View
    {
        return view('wifeStudyStatuss.show', [
            'wifeStudyStatus' => $wifeStudyStatus
        ]);
    }

    public function edit(WifeStudyStatus $wifeStudyStatus): View
    {
        return view('wifeStudyStatuss.edit', [
            'wifeStudyStatus' => $wifeStudyStatus,
        ]);
    }

    public function update(Request $request, WifeStudyStatus $wifeStudyStatus): RedirectResponse
    {
        $wifeStudyStatus->update($request->all());
        return redirect()->route('wifeStudyStatuss.index');
    }

    public function destroy(WifeStudyStatus $wifeStudyStatus): RedirectResponse
    {
        $wifeStudyStatus->delete();
        return redirect()->route('wifeStudyStatuss.index');
    }
}