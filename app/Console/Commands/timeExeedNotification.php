<?php

namespace App\Console\Commands;

use App\Repository\NotificationRepository;
use Illuminate\Console\Command;

class timeExeedNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:timeExeedNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will create admin notify in within 3 hours if job time exeeds';

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
        $jobs = new NotificationRepository();
        $jobs->setNotification();
    }
}
