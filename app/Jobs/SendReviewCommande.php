<?php

namespace App\Jobs;

use App\Models\Orders;
use App\Mail\ReviewCommande;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class SendReviewCommande implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        Mail::to($this->order->user->email)->send(new ReviewCommande($this->order));
    }
}
