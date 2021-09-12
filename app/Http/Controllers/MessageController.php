<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): View
    {
        return view('messages.index', [
            'messages' => Message::all(),
        ]);
    }

    public function create(): View
    {
        return view('messages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Message::create($request->all());
        return redirect()->route('messages.index');
    }

    public function show(Message $message): View
    {
        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function edit(Message $message): View
    {
        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    public function update(Request $request, Message $message): RedirectResponse
    {
        $message->update($request->all());
        return redirect()->route('messages.index');
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();
        return redirect()->route('messages.index');
    }
}