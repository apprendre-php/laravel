<?php

namespace App\Jobs;

use App\Models\Report;
use League\Csv\Writer;
use SplTempFileObject;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $items;
    private string $fileName;

    public function __construct(array $items, string $fileName)
    {
        $this->items = $items;
        $this->fileName = $fileName;
        Log::info($items);
        Log::info($fileName);
    }

    public function handle()
    {
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        $csv->insertOne(['name', 'thumbnail', 'price', 'quantity', 'description']);
        $csv->insertAll($this->items);

        Storage::disk('local')->put($this->fileName,  $csv->toString());

        $report = Report::create([
            'filename' => $this->fileName,
            'status' => 'waiting',
        ]);

        sendReport::dispatch($report);
    }
}
