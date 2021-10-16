<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    public function index(): View
    {
        return view('settings.index', [
            'settings' => Setting::all(),
        ]);
    }

    public function create(): View
    {
        return view('settings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Setting::create($request->all());
        return redirect()->route('settings.index');
    }

    public function show(Setting $setting): View
    {
        return view('settings.show', [
            'setting' => $setting
        ]);
    }

    public function edit(Setting $setting): View
    {
        return view('settings.edit', [
            'setting' => $setting,
        ]);
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->all());
        return redirect()->route('settings.index');
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        $setting->delete();
        return redirect()->route('settings.index');
    }
}