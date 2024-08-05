<?php

namespace App\Console\Commands;

use App\Repository\TimeLoggerRepository;
use Illuminate\Console\Command;

class providerReInitStartOfDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reInitStartOfDay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        TimeLoggerRepository::reInitLogin();
    }
}
