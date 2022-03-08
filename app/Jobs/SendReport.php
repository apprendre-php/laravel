<?php

namespace App\Jobs;

use App\Events\SendReportFinish;
use App\Mail\ReportItems;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function handle()
    {
        Mail::to('tom@mds.fr')->send(new ReportItems($this->report));

        SendReportFinish::dispatch($this->report);
    }
}
