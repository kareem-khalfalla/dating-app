<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function index(): View
    {
        return view('hobbys.index', [
            'hobbys' => Hobby::all(),
        ]);
    }

    public function create(): View
    {
        return view('hobbys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Hobby::create($request->all());
        return redirect()->route('hobbys.index');
    }

    public function show(Hobby $hobby): View
    {
        return view('hobbys.show', [
            'hobby' => $hobby
        ]);
    }

    public function edit(Hobby $hobby): View
    {
        return view('hobbys.edit', [
            'hobby' => $hobby,
        ]);
    }

    public function update(Request $request, Hobby $hobby): RedirectResponse
    {
        $hobby->update($request->all());
        return redirect()->route('hobbys.index');
    }

    public function destroy(Hobby $hobby): RedirectResponse
    {
        $hobby->delete();
        return redirect()->route('hobbys.index');
    }
}