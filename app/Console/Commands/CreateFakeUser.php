<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateFakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake user';

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
        $this->call('db:seed', [
            '--class' => 'UserSeeder'
        ]);
        return 0;
    }
}
