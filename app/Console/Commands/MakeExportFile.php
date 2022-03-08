<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Jobs\CreateReport;
use Illuminate\Console\Command;

class MakeExportFile extends Command
{
    protected $signature = 'rapport:make {quantity?} {--filename=example.csv}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $builder = Item::select('name', 'thumbnail', 'price', 'quantity', 'description');

        if ($this->argument('quantity')) {
            $builder = $builder->where('quantity', '<', $this->argument('quantity'));
        }

        $items = $builder->get();

        $filename = $this->option('filename');

        CreateReport::dispatch($items->toArray(), $filename);

        return self::SUCCESS;
    }
}
