<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Carbon\Carbon;

class getCancelledOrders extends Command
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
    protected $description = 'Remontera toutes les commandes annulées la veille. Cette commande devras s\'exécuter à 00h10.';

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
        $cancelledOrders = Order::where('status','cancelled')->where('updated_at','>',Carbon::now()->subDays(1))->get();

        $this->table(['Commandes annulées'],$cancelledOrders->toArray());

        return 0;
    }
}
