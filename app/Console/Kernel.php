<?php

namespace App\Console;

use App\Console\Commands\CreateFakeUser;
use App\Console\Commands\DeleteFakeUsers;
use App\Console\Commands\DeleteInactiveUsers;
use App\Console\Commands\SendReminderEmails;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendReminderEmails::class,
        DeleteInactiveUsers::class,
        DeleteFakeUsers::class,
        CreateFakeUser::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $adminInput = User::find(1)->schuedule_task_time;
        
        $schedule->command('reminders:emails')->daily();
        $schedule->command('users:delete-inactive')->daily();
        $schedule->command('users:delete-fake')->daily();
        $schedule->command('users:create-fake')->$adminInput();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
