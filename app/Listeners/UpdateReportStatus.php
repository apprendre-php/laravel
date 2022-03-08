<?php

namespace App\Listeners;

use App\Events\SendReportFinish;

class UpdateReportStatus
{
    public function handle(SendReportFinish $event)
    {
        $report = $event->report;

        $report->update([
            'status' => 'completed',
        ]);
    }
}
