<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class OrderCancelled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:cancelled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remontes toutes les commandes annulées de la veille';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $orders = Order::select('number')->where('status', 'cancelled')->where('updated_at', '>' ,Carbon::now())->get();

        foreach($orders  as $order){
            Log::info('La commande n°' . $order->number . ' a été annuler');
        }
        
        return 0;
    }
}
