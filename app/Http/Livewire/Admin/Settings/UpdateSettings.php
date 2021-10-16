<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateSettings extends Component
{
    public $createFakeUserTime;
    public $deleteFakeUserTime;

    public function render()
    {
        return view('livewire.admin.settings.update-settings');
    }

    public function mount()
    {
        $setting = Setting::first();
        $this->createFakeUserTime = $setting->create_fake_user_time;
        $this->deleteFakeUserTime = $setting->delete_fake_user_time;
    }

    public function updatedCreateFakeUserTime(): void
    {
        Validator::make([$this->createFakeUserTime], [
            'create_fake_user_time' => ['string', Rule::in($this->data())]
        ])->validate();

        Setting::first()->update([
            'create_fake_user_time' => $this->createFakeUserTime
        ]);

        $this->success();
    }

    public function updatedDeleteFakeUserTime(): void
    {
        Validator::make([$this->deleteFakeUserTime], [
            'delete_fake_user_time' => ['string', Rule::in($this->data())]
        ])->validate();

        Setting::first()->update([
            'delete_fake_user_time' => $this->deleteFakeUserTime
        ]);

        $this->success();
    }

    private function data(): array
    {
        return [
            'everyMinute',
            'everyTwoMinutes',
            'everyThreeMinutes',
            'everyFourMinutes',
            'everyFiveMinutes',
            'everyTenMinutes',
            'everyFifteenMinutes',
            'everyThirtyMinutes',
            'hourly',
            'everyTwoHours',
            'everyThreeHours',
            'everyFourHours',
            'everySixHours',
            'daily',
            'twiceDaily',
            'weekly',
            'monthly',
            'twiceMonthly',
            'lastDayOfMonth',
            'yearly',
        ];
    }

    private function success(): void
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'Success',
            'timer' => 1000,
            'type'  => 'success',
        ]);
    }
}
