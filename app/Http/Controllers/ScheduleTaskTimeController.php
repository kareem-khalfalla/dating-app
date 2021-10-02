<?php

namespace App\Http\Controllers;

use App\Models\ScheduleTaskTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleTaskTimeController extends Controller
{
    public function index(): View
    {
        return view('scheduleTaskTimes.index', [
            'scheduleTaskTimes' => ScheduleTaskTime::all(),
        ]);
    }

    public function create(): View
    {
        return view('scheduleTaskTimes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ScheduleTaskTime::create($request->all());
        return redirect()->route('scheduleTaskTimes.index');
    }

    public function show(ScheduleTaskTime $scheduleTaskTime): View
    {
        return view('scheduleTaskTimes.show', [
            'scheduleTaskTime' => $scheduleTaskTime
        ]);
    }

    public function edit(ScheduleTaskTime $scheduleTaskTime): View
    {
        return view('scheduleTaskTimes.edit', [
            'scheduleTaskTime' => $scheduleTaskTime,
        ]);
    }

    public function update(Request $request, ScheduleTaskTime $scheduleTaskTime): RedirectResponse
    {
        $scheduleTaskTime->update($request->all());
        return redirect()->route('scheduleTaskTimes.index');
    }

    public function destroy(ScheduleTaskTime $scheduleTaskTime): RedirectResponse
    {
        $scheduleTaskTime->delete();
        return redirect()->route('scheduleTaskTimes.index');
    }
}