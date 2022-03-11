<?php

namespace App\Jobs;

use App\Http\Controllers\OrderController;
use App\Models\Report;
use App\Mail\ReportOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class sendMailCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function handle()
    {
        Mail::to(Auth::user()->email)->send(new ReportOrder($this->report));

    }
}
