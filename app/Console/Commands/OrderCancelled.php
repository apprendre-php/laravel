<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

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
    protected $description = 'Affiche les commandes annulé d\'hier';

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
    public function handle(Schedule $schedule)
    {
        $cancelled_orders = Order::select('number', 'status', 'created_at', 'updated_at')->where('status', 'cancelled')->whereBetween('updated_at', [Carbon::today(), Carbon::tomorrow()])->get();

        $this->table(['Commandes supprimés', 'status', 'Créé le', 'Dernière modification le'], $cancelled_orders->toArray());
    }
}
