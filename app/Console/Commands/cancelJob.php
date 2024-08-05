<?php
namespace App\Console\Commands;
use App\Repository\DispatchJobRepository;
use Illuminate\Console\Command;
class cancelJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cancelJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cancelJob command to cancel generated job if no provider found';

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
        $jobs->cancelJob();
    }
}
