<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(): View
    {
        return view('foods.index', [
            'foods' => Food::all(),
        ]);
    }

    public function create(): View
    {
        return view('foods.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Food::create($request->all());
        return redirect()->route('foods.index');
    }

    public function show(Food $food): View
    {
        return view('foods.show', [
            'food' => $food
        ]);
    }

    public function edit(Food $food): View
    {
        return view('foods.edit', [
            'food' => $food,
        ]);
    }

    public function update(Request $request, Food $food): RedirectResponse
    {
        $food->update($request->all());
        return redirect()->route('foods.index');
    }

    public function destroy(Food $food): RedirectResponse
    {
        $food->delete();
        return redirect()->route('foods.index');
    }
}