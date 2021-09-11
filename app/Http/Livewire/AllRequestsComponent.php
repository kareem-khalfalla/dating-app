<?php

namespace App\Http\Livewire;

use App\Models\Friendship;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AllRequestsComponent extends Component
{
    public function render(): View
    {
        return view('livewire.all-requests-component', [
            'requests' => Friendship::where('status', 0)->where('to', auth()->id())->get()
        ]);
    }

    public function acceptFriend(int $from): void
    {
        Friendship::where('from', $from)->where('to', auth()->id())->first()->update([
            'status' => 1
        ]);
    }
}
