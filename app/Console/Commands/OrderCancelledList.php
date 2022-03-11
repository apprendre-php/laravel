<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class OrderCancelledList extends Command
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
    protected $description = 'Command description';

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
        $orders = Order::select('number', 'updated_at')
            ->where('status', '=', 'cancel')
            ->where('updated_at', '>=', Carbon::yesterday()->setTime(00, 00, 00)->toDateTimeString())
            ->where('updated_at', '>=', Carbon::yesterday()->setTime(23, 59, 59)->toDateTimeString())->get();

        $this->table(
            ['number', 'cancelled_at'],
            $orders->toArray()
        );

        return 0;
    }
}
