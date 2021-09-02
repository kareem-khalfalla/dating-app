<?php

namespace App\Http\Controllers;

use App\Models\AcceptWifeWorkStatuses;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptWifeWorkStatusesController extends Controller
{
    public function index(): View
    {
        return view('acceptWifeWorkStatusess.index', [
            'acceptWifeWorkStatusess' => AcceptWifeWorkStatuses::all(),
        ]);
    }

    public function create(): View
    {
        return view('acceptWifeWorkStatusess.create');
    }

    public function store(Request $request): RedirectResponse
    {
        AcceptWifeWorkStatuses::create($request->all());
        return redirect()->route('acceptWifeWorkStatusess.index');
    }

    public function show(AcceptWifeWorkStatuses $acceptWifeWorkStatuses): View
    {
        return view('acceptWifeWorkStatusess.show', [
            'acceptWifeWorkStatuses' => $acceptWifeWorkStatuses
        ]);
    }

    public function edit(AcceptWifeWorkStatuses $acceptWifeWorkStatuses): View
    {
        return view('acceptWifeWorkStatusess.edit', [
            'acceptWifeWorkStatuses' => $acceptWifeWorkStatuses,
        ]);
    }

    public function update(Request $request, AcceptWifeWorkStatuses $acceptWifeWorkStatuses): RedirectResponse
    {
        $acceptWifeWorkStatuses->update($request->all());
        return redirect()->route('acceptWifeWorkStatusess.index');
    }

    public function destroy(AcceptWifeWorkStatuses $acceptWifeWorkStatuses): RedirectResponse
    {
        $acceptWifeWorkStatuses->delete();
        return redirect()->route('acceptWifeWorkStatusess.index');
    }
}