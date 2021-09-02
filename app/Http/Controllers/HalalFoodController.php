<?php

namespace App\Http\Controllers;

use App\Models\HalalFood;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HalalFoodController extends Controller
{
    public function index(): View
    {
        return view('halalFoods.index', [
            'halalFoods' => HalalFood::all(),
        ]);
    }

    public function create(): View
    {
        return view('halalFoods.create');
    }

    public function store(Request $request): RedirectResponse
    {
        HalalFood::create($request->all());
        return redirect()->route('halalFoods.index');
    }

    public function show(HalalFood $halalFood): View
    {
        return view('halalFoods.show', [
            'halalFood' => $halalFood
        ]);
    }

    public function edit(HalalFood $halalFood): View
    {
        return view('halalFoods.edit', [
            'halalFood' => $halalFood,
        ]);
    }

    public function update(Request $request, HalalFood $halalFood): RedirectResponse
    {
        $halalFood->update($request->all());
        return redirect()->route('halalFoods.index');
    }

    public function destroy(HalalFood $halalFood): RedirectResponse
    {
        $halalFood->delete();
        return redirect()->route('halalFoods.index');
    }
}