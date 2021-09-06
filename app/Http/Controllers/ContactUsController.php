<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(): View
    {
        return view('contactUss.index', [
            'contactUss' => ContactUs::all(),
        ]);
    }

    public function create(): View
    {
        return view('contactUss.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ContactUs::create($request->all());
        return redirect()->route('contactUss.index');
    }

    public function show(ContactUs $contactUs): View
    {
        return view('contactUss.show', [
            'contactUs' => $contactUs
        ]);
    }

    public function edit(ContactUs $contactUs): View
    {
        return view('contactUss.edit', [
            'contactUs' => $contactUs,
        ]);
    }

    public function update(Request $request, ContactUs $contactUs): RedirectResponse
    {
        $contactUs->update($request->all());
        return redirect()->route('contactUss.index');
    }

    public function destroy(ContactUs $contactUs): RedirectResponse
    {
        $contactUs->delete();
        return redirect()->route('contactUss.index');
    }
}