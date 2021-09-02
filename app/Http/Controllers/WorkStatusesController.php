<?php

namespace App\Http\Controllers;

use App\Models\WorkStatuses;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WorkStatusesController extends Controller
{
    public function index(): View
    {
        return view('works.index', [
            'works' => WorkStatuses::all(),
        ]);
    }

    public function create(): View
    {
        return view('works.create');
    }

    public function store(Request $request): RedirectResponse
    {
        WorkStatuses::create($request->all());
        return redirect()->route('works.index');
    }

    public function show(WorkStatuses $workStatuses): View
    {
        return view('works.show', [
            'WorkStatuses' => $workStatuses
        ]);
    }

    public function edit(WorkStatuses $workStatuses): View
    {
        return view('works.edit', [
            'WorkStatuses' => $workStatuses,
        ]);
    }

    public function update(Request $request, WorkStatuses $workStatuses): RedirectResponse
    {
        $workStatuses->update($request->all());
        return redirect()->route('works.index');
    }

    public function destroy(WorkStatuses $workStatuses): RedirectResponse
    {
        $workStatuses->delete();
        return redirect()->route('works.index');
    }
}