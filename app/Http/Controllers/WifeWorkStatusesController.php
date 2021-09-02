<?php

namespace App\Http\Controllers;

use App\Models\WifeWorkStatuses;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WifeWorkStatusesController extends Controller
{
    public function index(): View
    {
        return view('wifeWorkStatusess.index', [
            'wifeWorkStatusess' => WifeWorkStatuses::all(),
        ]);
    }

    public function create(): View
    {
        return view('wifeWorkStatusess.create');
    }

    public function store(Request $request): RedirectResponse
    {
        WifeWorkStatuses::create($request->all());
        return redirect()->route('wifeWorkStatusess.index');
    }

    public function show(WifeWorkStatuses $wifeWorkStatuses): View
    {
        return view('wifeWorkStatusess.show', [
            'wifeWorkStatuses' => $wifeWorkStatuses
        ]);
    }

    public function edit(WifeWorkStatuses $wifeWorkStatuses): View
    {
        return view('wifeWorkStatusess.edit', [
            'wifeWorkStatuses' => $wifeWorkStatuses,
        ]);
    }

    public function update(Request $request, WifeWorkStatuses $wifeWorkStatuses): RedirectResponse
    {
        $wifeWorkStatuses->update($request->all());
        return redirect()->route('wifeWorkStatusess.index');
    }

    public function destroy(WifeWorkStatuses $wifeWorkStatuses): RedirectResponse
    {
        $wifeWorkStatuses->delete();
        return redirect()->route('wifeWorkStatusess.index');
    }
}