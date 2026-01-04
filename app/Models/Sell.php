<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'item_id',
        'user_id',
        'quantity',
        'total_price',
        'sell_date',
    ];

    // Relationship with Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}