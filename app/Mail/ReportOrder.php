<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $report;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $path = storage_path('app/' . $this->report->filename);

        return $this->view('mails.reportcheckout');                    
            
    }
}
