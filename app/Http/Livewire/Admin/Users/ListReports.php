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
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => __('alerts.Are you sure?'),
            'text'  => __('alerts.You won\'t be able to revert this!'),
            'type'  => 'warning',
        ]);
    }

    public function destroy(): void
    {
        Report::find($this->reportId)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => __('alerts.Report deleted successfully')
        ]);
    }
}
