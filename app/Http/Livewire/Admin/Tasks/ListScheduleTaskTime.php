<?php

namespace App\Http\Livewire\Admin\Tasks;

use App\Models\ScheduleTaskTime;
use App\Models\User;
use Livewire\Component;

class ListScheduleTaskTime extends Component
{
    public $schueduleTaskTime;

    public function render()
    {
        return view('livewire.admin.tasks.list-schedule-task-time', [
            'scheduleTaskTimes' => ScheduleTaskTime::all()
        ]);
    }

    public function updatedSchueduleTaskTime()
    {
        User::find(1)->update([
            'schuedule_task_time' => $this->schueduleTaskTime
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            // 'title' => 'Success',
            'text'  => 'Done',
            // 'timer' => 5000,
            'type'  => 'success',
        ]);
    }
}
