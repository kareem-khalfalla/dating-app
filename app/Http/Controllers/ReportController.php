<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('reports.index', [
            'reports' => Report::all(),
        ]);
    }

    public function create(): View
    {
        return view('reports.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Report::create($request->all());
        return redirect()->route('reports.index');
    }

    public function show(Report $report): View
    {
        return view('reports.show', [
            'report' => $report
        ]);
    }

    public function edit(Report $report): View
    {
        return view('reports.edit', [
            'report' => $report,
        ]);
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $report->update($request->all());
        return redirect()->route('reports.index');
    }

    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();
        return redirect()->route('reports.index');
    }
}