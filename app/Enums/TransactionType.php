<?php

namespace App\Enums;

enum TransactionType : string 
{
    case DEPOSIT = 'deposit';
    case WITHDRAWAL = 'widthdrawal';

    public function toString()
    {
        return match($this) {
            self::DEPOSIT    => 'Deposit',
            self::WITHDRAWAL => 'Withdrawal',
        };
    }
}