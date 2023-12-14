<?php

namespace App\Enums;

enum CoinTransactionTypeEnum : string 
{
    case BUY = 'buy';
    case SELL = 'sell';

    public function toString()
    {
        return match($this) {
            self::BUY    => 'Buy',
            self::SELL => 'Sell',
        };
    }
}