<?php

namespace App\Console\Commands;

use App\Jobs\SendReport;
use App\Models\Report;
use Illuminate\Console\Command;

class SendExportFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rapport:send';

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
     * @return int
     */
    public function handle()
    {
        $reports = Report::where('status', 'waiting')->get();

        $reports->each(function (Report $report) {
            SendReport::dispatch($report);
        });

        return 0;
    }
}
