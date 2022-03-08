<?php

namespace App\Jobs;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use SplTempFileObject;

class CreateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $items;
    private string $fileName;

    public function __construct(array $items, string $fileName)
    {
        $this->items = $items;
        $this->fileName = $fileName;
    }

    public function handle()
    {
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        $csv->insertOne(['name', 'thumbnail', 'price', 'quantity', 'description']);
        $csv->insertAll($this->items);

        Storage::disk('local')->put($this->fileName,  $csv->toString());

        Report::create([
            'filename' => $this->fileName,
            'status' => 'waiting',
        ]);
    }
}
