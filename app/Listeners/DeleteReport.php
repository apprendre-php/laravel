<?php

namespace App\Listeners;

use App\Events\SendReportFinish;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;


class DeleteReport
{
    public function handle(SendReportFinish $event)
    {
        Storage::delete($event->report->filename);
    }
}
