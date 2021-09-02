<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function index(): View
    {
        return view('methods.index', [
            'methods' => Method::all(),
        ]);
    }

    public function create(): View
    {
        return view('methods.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Method::create($request->all());
        return redirect()->route('methods.index');
    }

    public function show(Method $method): View
    {
        return view('methods.show', [
            'method' => $method
        ]);
    }

    public function edit(Method $method): View
    {
        return view('methods.edit', [
            'method' => $method,
        ]);
    }

    public function update(Request $request, Method $method): RedirectResponse
    {
        $method->update($request->all());
        return redirect()->route('methods.index');
    }

    public function destroy(Method $method): RedirectResponse
    {
        $method->delete();
        return redirect()->route('methods.index');
    }
}