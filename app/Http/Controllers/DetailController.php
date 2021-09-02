<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(): View
    {
        return view('detailss.index', [
            'detailss' => Detail::all(),
        ]);
    }

    public function create(): View
    {
        return view('detailss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Detail::create($request->all());
        return redirect()->route('detailss.index');
    }

    public function show(Detail $details): View
    {
        return view('detailss.show', [
            'details' => $details
        ]);
    }

    public function edit(Detail $details): View
    {
        return view('detailss.edit', [
            'details' => $details,
        ]);
    }

    public function update(Request $request, Detail $details): RedirectResponse
    {
        $details->update($request->all());
        return redirect()->route('detailss.index');
    }

    public function destroy(Detail $details): RedirectResponse
    {
        $details->delete();
        return redirect()->route('detailss.index');
    }
}