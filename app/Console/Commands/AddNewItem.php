<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AddNewItem extends Command
{
    protected $signature = 'item:add';

    protected $description = 'Add new item in database';

    public function handle()
    {
        $attributes = [
            'name' => $this->ask("Nom de l'item"),
            'thumbnail' => $this->ask("Thumbnail de l'item"),
            'price' => $this->ask("Price de l'item"),
            'quantity' => $this->ask("Quantitée de l'item"),
            'description' => $this->ask("Description de l'item"),
        ];

        $rules = [
            'name' => 'required',
            'thumbnail' => 'required|url',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|gte:0',
            'description' => 'required',
        ];

        $validator = Validator::make($attributes, $rules);

        if ($validator->errors()->isNotEmpty()) {
            foreach ($validator->errors()->toArray() as $error) {
                $this->error($error[0]);
            }

            return 2;
        }

        Item::create($attributes);

        $this->info("L'item a bien été ajouté en base de données");

        return 0;
    }
}
