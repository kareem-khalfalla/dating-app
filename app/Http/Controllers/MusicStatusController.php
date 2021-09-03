<?php

namespace App\Http\Controllers;

use App\Models\MusicStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MusicStatusController extends Controller
{
    public function index(): View
    {
        return view('musicStatuss.index', [
            'musicStatuss' => MusicStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('musicStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        MusicStatus::create($request->all());
        return redirect()->route('musicStatuss.index');
    }

    public function show(MusicStatus $musicStatus): View
    {
        return view('musicStatuss.show', [
            'musicStatus' => $musicStatus
        ]);
    }

    public function edit(MusicStatus $musicStatus): View
    {
        return view('musicStatuss.edit', [
            'musicStatus' => $musicStatus,
        ]);
    }

    public function update(Request $request, MusicStatus $musicStatus): RedirectResponse
    {
        $musicStatus->update($request->all());
        return redirect()->route('musicStatuss.index');
    }

    public function destroy(MusicStatus $musicStatus): RedirectResponse
    {
        $musicStatus->delete();
        return redirect()->route('musicStatuss.index');
    }
}