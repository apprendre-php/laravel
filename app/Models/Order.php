<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'status',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countTotalItems(): int
    {
        $count = 0;

        foreach ($this->items as $item) {
            $count += $item->pivot->quantity;
        }

        return $count;
    }

    public function getPrice(): float
    {
        $price = 0;

        foreach ($this->items as $item) {
            $price += $item->pivot->quantity * $item->price;
        }

        return $price;
    }
}
