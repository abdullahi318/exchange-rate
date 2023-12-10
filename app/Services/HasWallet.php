<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Services\Exceptions\InsufficientFundException;
use App\Services\Exceptions\InvalidAmountException;

trait HasWallet 
{
    public function deposit(int|float $amount): float|int
    {
        $this->throwExceptionIfAmountIsInvalid($amount);

        $balance = $this->wallet_balance ?? 0;

        $balance += $amount;
        $this->increment('wallet_balance', $amount);

        $this->forceFill(['wallet_balance' => $balance])->save();

        return $balance;
        return $this->wallet_balance;
    }

    public function withdraw(int|float $amount): float|int
    {
        $this->throwExceptionIfAmountIsInvalid($amount);

        $this->throwExceptionIfFundIsInsufficient($amount);

        $balance = $this->wallet_balance - $amount;

        $this->forceFill(['wallet_balance' => $balance])->save();
        $this->decrement('wallet_balance', $amount);

        return $balance;
        return $this->wallet_balance;
    }

    public function canWithdraw(int|float $amount): bool
    {
        $this->throwExceptionIfAmountIsInvalid($amount);
        $balance = $this->wallet_balance ?? 0;
        return $balance >= $amount;
    }
    public function balance(): Attribute
    {
        return Attribute::get(fn () => $this->wallet_balance ?? 0);
    }
    public function throwExceptionIfAmountIsInvalid(int|float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException();
        }
    }
    public function throwExceptionIfFundIsInsufficient(int|float $amount): void
    {
        if (! $this->canWithdraw($amount)) {
            throw new InsufficientFundException();
        }
    }
}