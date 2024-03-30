<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_date_time', 
        'stock_name',
        'listing_price',
        'quantity',
        'type',
        'price_per_unit',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
    
}
