<?php

namespace App\Http\Controllers;

use App\Models\FriendStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FriendStatusController extends Controller
{
    public function index(): View
    {
        return view('friendStatuss.index', [
            'friendStatuss' => FriendStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('friendStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        FriendStatus::create($request->all());
        return redirect()->route('friendStatuss.index');
    }

    public function show(FriendStatus $friendStatus): View
    {
        return view('friendStatuss.show', [
            'friendStatus' => $friendStatus
        ]);
    }

    public function edit(FriendStatus $friendStatus): View
    {
        return view('friendStatuss.edit', [
            'friendStatus' => $friendStatus,
        ]);
    }

    public function update(Request $request, FriendStatus $friendStatus): RedirectResponse
    {
        $friendStatus->update($request->all());
        return redirect()->route('friendStatuss.index');
    }

    public function destroy(FriendStatus $friendStatus): RedirectResponse
    {
        $friendStatus->delete();
        return redirect()->route('friendStatuss.index');
    }
}