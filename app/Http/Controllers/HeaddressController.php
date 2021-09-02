<?php

namespace App\Http\Controllers;

use App\Models\Headdress;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HeaddressController extends Controller
{
    public function index(): View
    {
        return view('headdresss.index', [
            'headdresss' => Headdress::all(),
        ]);
    }

    public function create(): View
    {
        return view('headdresss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Headdress::create($request->all());
        return redirect()->route('headdresss.index');
    }

    public function show(Headdress $headdress): View
    {
        return view('headdresss.show', [
            'headdress' => $headdress
        ]);
    }

    public function edit(Headdress $headdress): View
    {
        return view('headdresss.edit', [
            'headdress' => $headdress,
        ]);
    }

    public function update(Request $request, Headdress $headdress): RedirectResponse
    {
        $headdress->update($request->all());
        return redirect()->route('headdresss.index');
    }

    public function destroy(Headdress $headdress): RedirectResponse
    {
        $headdress->delete();
        return redirect()->route('headdresss.index');
    }
}