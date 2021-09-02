<?php

namespace App\Http\Controllers;

use App\Models\SocialStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialStatusController extends Controller
{
    public function index(): View
    {
        return view('socialStatuss.index', [
            'socialStatuss' => SocialStatus::all(),
        ]);
    }

    public function create(): View
    {
        return view('socialStatuss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        SocialStatus::create($request->all());
        return redirect()->route('socialStatuss.index');
    }

    public function show(SocialStatus $socialStatus): View
    {
        return view('socialStatuss.show', [
            'socialStatus' => $socialStatus
        ]);
    }

    public function edit(SocialStatus $socialStatus): View
    {
        return view('socialStatuss.edit', [
            'socialStatus' => $socialStatus,
        ]);
    }

    public function update(Request $request, SocialStatus $socialStatus): RedirectResponse
    {
        $socialStatus->update($request->all());
        return redirect()->route('socialStatuss.index');
    }

    public function destroy(SocialStatus $socialStatus): RedirectResponse
    {
        $socialStatus->delete();
        return redirect()->route('socialStatuss.index');
    }
}