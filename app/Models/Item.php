<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'thumbnail', 'price', 'quantity', 'description',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
