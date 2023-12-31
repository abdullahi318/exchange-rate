<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $fillable = ['name','code','sell_rate', 'buy_rate'];

    public function exchangeRates()
    {
        $this->hasMany(ExchangeRate::class,'from_currency_id');
    }

    public function coinTransactions() {
        return $this->hasMany(CoinTransaction::class);
    }
}
