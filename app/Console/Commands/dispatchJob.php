<?php

namespace App\Console\Commands;

use App\Classes\PushNotifications;
use App\Job;
use App\Repository\DispatchJobRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dispatchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:dipatchJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will dispatch Job either for schedual or instant job';

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
        $jobs->dispatchJob();
    }
}
