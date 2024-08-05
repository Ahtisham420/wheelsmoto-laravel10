<?php

namespace App\Console\Commands;

use App\Classes\PushNotifications;
use App\Job;
use App\Mail\defaultNotify;
use App\Repository\DispatchJobRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class timeOutJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:timeOutJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Job will time out for exeed time out';

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
     * @return mixed
     */
    public function handle()
    {
        $jobs = new DispatchJobRepository();
        $jobs->timeOutJob();
    }
}
