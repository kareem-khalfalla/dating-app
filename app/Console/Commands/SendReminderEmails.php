<?php

namespace App\Console\Commands;

use App\Mail\FirstMonthReminderEmail;
use App\Mail\SecondMonthReminderEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminders.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $firstMonthUsers = User::lastSeenAtByMonths()->get();
        $secondMonthUsers = User::lastSeenAtByMonths(2)->get();

        foreach ($firstMonthUsers as $firstMonthUser) {
            Mail::to($firstMonthUser)->send(new FirstMonthReminderEmail($firstMonthUser->name));
        }

        foreach ($secondMonthUsers as $secondMonthUser) {
            Mail::to($secondMonthUser)->send(new SecondMonthReminderEmail($secondMonthUser->name));
        }

        return 0;
    }
}
