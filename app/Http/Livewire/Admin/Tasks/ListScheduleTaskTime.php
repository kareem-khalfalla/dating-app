<?php

namespace App\Http\Livewire\Admin\Tasks;

use App\Models\ScheduleTaskTime;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListScheduleTaskTime extends Component
{
    public $createFakeUserTime;
    public $deleteFakeUserTime;

    public function render(): View
    {
        return view('livewire.admin.tasks.list-schedule-task-time', [
            'scheduleTaskTimes' => ScheduleTaskTime::all()
        ]);
    }

    public function mount()
    {
        $this->createFakeUserTime = User::find(1)->create_fake_time;
        $this->deleteFakeUserTime = User::find(1)->delete_fake_time;
    }

    public function updatedCreateFakeUserTime(): void
    {
        User::find(1)->update([
            'create_fake_time' => $this->createFakeUserTime
        ]);

        $this->success();
    }

    public function updatedDeleteFakeUserTime(): void
    {
        User::find(1)->update([
            'delete_fake_time' => $this->deleteFakeUserTime
        ]);

        $this->success();
    }

    private function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'Success',
            'timer' => 1000,
            'type'  => 'success',
        ]);
    }
}
