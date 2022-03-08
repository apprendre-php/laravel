<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportItems extends Mailable
{
    use Queueable, SerializesModels;

    private $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function build()
    {
        $path = storage_path('app/' . $this->report->filename);

        return $this->view('mails.report')
            ->attach($path, [
                'as' => 'report.csv',
            ]);
    }
}
