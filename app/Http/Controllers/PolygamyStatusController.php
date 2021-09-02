<?php

namespace App\Http\Controllers;

use App\Models\PolygamyStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PolygamyStatusController extends Controller
{
    public function index(): View
    {
        return view('polygamyStatuss.index', [
            'polygamyStatuss' => PolygamyStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('polygamyStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        PolygamyStatus::create($request->all());
        return redirect()->route('polygamyStatuss.index');
    }

    public function show(PolygamyStatus $polygamyStatus): View
    {
        return view('polygamyStatuss.show', [
            'polygamyStatus' => $polygamyStatus
        ]);
    }

    public function edit(PolygamyStatus $polygamyStatus): View
    {
        return view('polygamyStatuss.edit', [
            'polygamyStatus' => $polygamyStatus,
        ]);
    }

    public function update(Request $request, PolygamyStatus $polygamyStatus): RedirectResponse
    {
        $polygamyStatus->update($request->all());
        return redirect()->route('polygamyStatuss.index');
    }

    public function destroy(PolygamyStatus $polygamyStatus): RedirectResponse
    {
        $polygamyStatus->delete();
        return redirect()->route('polygamyStatuss.index');
    }
}