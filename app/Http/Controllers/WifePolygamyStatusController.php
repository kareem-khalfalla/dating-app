<?php

namespace App\Http\Controllers;

use App\Models\WifePolygamyStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WifePolygamyStatusController extends Controller
{
    public function index(): View
    {
        return view('wifePolygamyStatuss.index', [
            'wifePolygamyStatuss' => WifePolygamyStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('wifePolygamyStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        WifePolygamyStatus::create($request->all());
        return redirect()->route('wifePolygamyStatuss.index');
    }

    public function show(WifePolygamyStatus $wifePolygamyStatus): View
    {
        return view('wifePolygamyStatuss.show', [
            'wifePolygamyStatus' => $wifePolygamyStatus
        ]);
    }

    public function edit(WifePolygamyStatus $wifePolygamyStatus): View
    {
        return view('wifePolygamyStatuss.edit', [
            'wifePolygamyStatus' => $wifePolygamyStatus,
        ]);
    }

    public function update(Request $request, WifePolygamyStatus $wifePolygamyStatus): RedirectResponse
    {
        $wifePolygamyStatus->update($request->all());
        return redirect()->route('wifePolygamyStatuss.index');
    }

    public function destroy(WifePolygamyStatus $wifePolygamyStatus): RedirectResponse
    {
        $wifePolygamyStatus->delete();
        return redirect()->route('wifePolygamyStatuss.index');
    }
}