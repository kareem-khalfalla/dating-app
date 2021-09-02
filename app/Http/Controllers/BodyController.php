<?php

namespace App\Http\Controllers;

use App\Models\Body;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BodyController extends Controller
{
    public function index(): View
    {
        return view('bodys.index', [
            'bodys' => Body::all(),
        ]);
    }

    public function create(): View
    {
        return view('bodys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Body::create($request->all());
        return redirect()->route('bodys.index');
    }

    public function show(Body $body): View
    {
        return view('bodys.show', [
            'body' => $body
        ]);
    }

    public function edit(Body $body): View
    {
        return view('bodys.edit', [
            'body' => $body,
        ]);
    }

    public function update(Request $request, Body $body): RedirectResponse
    {
        $body->update($request->all());
        return redirect()->route('bodys.index');
    }

    public function destroy(Body $body): RedirectResponse
    {
        $body->delete();
        return redirect()->route('bodys.index');
    }
}