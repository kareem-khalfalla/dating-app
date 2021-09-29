<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Report;
use Livewire\Component;

class ListReports extends Component
{
    protected $listeners = [
        'destroy'
    ];

    public $reportId;

    public function render()
    {
        return view('livewire.admin.users.list-reports', [
            'reports' => Report::latest()->paginate(),
        ])->layout('layouts.admin');
    }

    public function confirm(int $id): void
    {
        $this->reportId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroy(): void
    {
        Report::find($this->reportId)->delete();
        $this->dispatchBrowserEvent('deleted', [
            'message' => 'Report deleted successfully'
        ]);
    }
}
