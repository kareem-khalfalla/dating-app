<?php

namespace App\Http\Controllers;

use App\Models\ShelterShape;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShelterShapeController extends Controller
{
    public function index(): View
    {
        return view('shelterShapes.index', [
            'shelterShapes' => ShelterShape::all(),
        ]);
    }

    public function create(): View
    {
        return view('shelterShapes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ShelterShape::create($request->all());
        return redirect()->route('shelterShapes.index');
    }

    public function show(ShelterShape $shelterShape): View
    {
        return view('shelterShapes.show', [
            'shelterShape' => $shelterShape
        ]);
    }

    public function edit(ShelterShape $shelterShape): View
    {
        return view('shelterShapes.edit', [
            'shelterShape' => $shelterShape,
        ]);
    }

    public function update(Request $request, ShelterShape $shelterShape): RedirectResponse
    {
        $shelterShape->update($request->all());
        return redirect()->route('shelterShapes.index');
    }

    public function destroy(ShelterShape $shelterShape): RedirectResponse
    {
        $shelterShape->delete();
        return redirect()->route('shelterShapes.index');
    }
}