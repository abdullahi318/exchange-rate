<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillables = ['from_currency_id','to_currency_id', 'rate'];

    public function fromCurrency()
    {
        $this->belongsTo(Coin::class, 'from_currency_id');
    }

    public function toCurrency()
    {
        $this->belongsTo(Coin::class, 'to_currency_id');
    }
}
