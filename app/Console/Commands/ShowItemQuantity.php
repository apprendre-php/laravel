<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;

class ShowItemQuantity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:show-under-quantity {quantity}';

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
        $items = Item::select('name', 'quantity')->where('quantity', '<', $this->argument('quantity'))->get();

        $this->table(
            ['article', 'quantitée'],
            $items->toArray()
        );
    }
}
