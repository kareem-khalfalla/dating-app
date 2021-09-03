<?php

namespace App\Http\Controllers;

use App\Models\AcceptWifeStudyStatuses;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptWifeStudyStatusesController extends Controller
{
    public function index(): View
    {
        return view('acceptWifeStudyStatusess.index', [
            'acceptWifeStudyStatusess' => AcceptWifeStudyStatuses::all(),
        ]);
    }

    public function create(): View
    {
        return view('acceptWifeStudyStatusess.create');
    }

    public function store(Request $request): RedirectResponse
    {
        AcceptWifeStudyStatuses::create($request->all());
        return redirect()->route('acceptWifeStudyStatusess.index');
    }

    public function show(AcceptWifeStudyStatuses $acceptWifeStudyStatuses): View
    {
        return view('acceptWifeStudyStatusess.show', [
            'acceptWifeStudyStatuses' => $acceptWifeStudyStatuses
        ]);
    }

    public function edit(AcceptWifeStudyStatuses $acceptWifeStudyStatuses): View
    {
        return view('acceptWifeStudyStatusess.edit', [
            'acceptWifeStudyStatuses' => $acceptWifeStudyStatuses,
        ]);
    }

    public function update(Request $request, AcceptWifeStudyStatuses $acceptWifeStudyStatuses): RedirectResponse
    {
        $acceptWifeStudyStatuses->update($request->all());
        return redirect()->route('acceptWifeStudyStatusess.index');
    }

    public function destroy(AcceptWifeStudyStatuses $acceptWifeStudyStatuses): RedirectResponse
    {
        $acceptWifeStudyStatuses->delete();
        return redirect()->route('acceptWifeStudyStatusess.index');
    }
}