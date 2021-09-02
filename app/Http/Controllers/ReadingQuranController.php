<?php

namespace App\Http\Controllers;

use App\Models\ReadingQuran;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReadingQuranController extends Controller
{
    public function index(): View
    {
        return view('readingQurans.index', [
            'readingQurans' => ReadingQuran::all(),
        ]);
    }

    public function create(): View
    {
        return view('readingQurans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ReadingQuran::create($request->all());
        return redirect()->route('readingQurans.index');
    }

    public function show(ReadingQuran $readingQuran): View
    {
        return view('readingQurans.show', [
            'readingQuran' => $readingQuran
        ]);
    }

    public function edit(ReadingQuran $readingQuran): View
    {
        return view('readingQurans.edit', [
            'readingQuran' => $readingQuran,
        ]);
    }

    public function update(Request $request, ReadingQuran $readingQuran): RedirectResponse
    {
        $readingQuran->update($request->all());
        return redirect()->route('readingQurans.index');
    }

    public function destroy(ReadingQuran $readingQuran): RedirectResponse
    {
        $readingQuran->delete();
        return redirect()->route('readingQurans.index');
    }
}