<?php

namespace App\Http\Controllers;

use App\Models\Eyeglass;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EyeglassController extends Controller
{
    public function index(): View
    {
        return view('eyeglasss.index', [
            'eyeglasss' => Eyeglass::all(),
        ]);
    }

    public function create(): View
    {
        return view('eyeglasss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Eyeglass::create($request->all());
        return redirect()->route('eyeglasss.index');
    }

    public function show(Eyeglass $eyeglass): View
    {
        return view('eyeglasss.show', [
            'eyeglass' => $eyeglass
        ]);
    }

    public function edit(Eyeglass $eyeglass): View
    {
        return view('eyeglasss.edit', [
            'eyeglass' => $eyeglass,
        ]);
    }

    public function update(Request $request, Eyeglass $eyeglass): RedirectResponse
    {
        $eyeglass->update($request->all());
        return redirect()->route('eyeglasss.index');
    }

    public function destroy(Eyeglass $eyeglass): RedirectResponse
    {
        $eyeglass->delete();
        return redirect()->route('eyeglasss.index');
    }
}