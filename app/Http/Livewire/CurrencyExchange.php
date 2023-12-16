<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

use App\Models\Coin;
use App\Models\CoinTransaction as Transaction;
use App\Enums\CoinTransactionTypeEnum;
use App\Enums\TransactionType;
use App\Events\WalletFunded;

class CurrencyExchange extends Component
{
    use WithFileUploads;

    public $buyCoinId;
    public $buyAmount;
    public $sellCoinId;
    public $sellAmount;
    public $totalAmount;

    protected $rules = [
        'buyCoinId' => 'required|exists:coins,id',
        'buyAmount' => 'required|numeric|min:0',
        'sellCoinId' => 'required|exists:coins,id',
        'sellAmount' => 'required|numeric|min:0',
    ];

    public function render()
    {
        $coins = Coin::all();

        return view('livewire.currency-exchange', compact('coins'));
    }

    // Buy asset
    public function buy()
    {
        $this->validate([
            'buyCoinId' => 'required|exists:coins,id',
            'buyAmount' => 'required|numeric|min:0',
        ]);

        // Perform the buying logic
        $currency = Coin::find($this->buyCoinId);
        $user = auth()->user();

        // Calculate total cost based on currency exchange rate or other factors
        $totalCost = $this->buyAmount * $currency->buy_rate;

        $wallet = $user->wallets()->first();

        $balance = $wallet->balance;

        // dd($totalCost, $balance);

        // Check if the user has enough balance
        if ($balance < $totalCost) {
            $this->addError('buyAmount', 'Insufficient funds.');
            return;
        }

        // Start the database transaction
        \DB::beginTransaction();

        try {
            // Deduct the amount from the user's wallet balance
            $wallet->decrement('balance', $totalCost);

            $wallet->save();

            $newBalance = $wallet->balance;

            // Create a buy transaction
            $transaction = $currency->coinTransactions()->create([
                'user_id' => $user->id,
                'type' => CoinTransactionTypeEnum::BUY,
                'amount' => $this->buyAmount,
                'total_cost' => $totalCost,
            ]);

            // Create User transaction - call WalletFunded Event
            event(new WalletFunded($user, $newBalance, $balance, $totalCost, TransactionType::WITHDRAWAL));

            // Commit the database transaction
            \DB::commit();

            session()->flash('success', 'Asset bought successfully.');
        } catch (\Exception $e) {
            // Rollback the database transaction on error
            \DB::rollback();

            session()->flash('error', 'Transaction failed. Please try again: ' . $e->getMessage());
        }
    }

    // Sell asset
    public function sell()
    {
        $this->validate([
            'sellCoinId' => 'required|exists:coins,id',
            'sellAmount' => 'required|numeric|min:0',
        ]);

        // Perform the selling logic
        $currency = Coin::find($this->sellCoinId);
        $user = auth()->user();

        // Calculate total earnings based on currency exchange rate or other factors
        $totalEarnings = $this->sellAmount * $currency->sell_rate;

        $wallet = $user->wallets()->first();

        $balance = $wallet->balance;

        // Start the database transaction
        \DB::beginTransaction();

        try {
            // Add the earnings to the user's wallet balance
            $wallet->increment('balance', $totalEarnings);

            $wallet->save();

            $newBalance = $wallet->balance;

            // Create a sell transaction
            $transaction = $currency->coinTransactions()->create([
                'user_id' => $user->id,
                'type' => CoinTransactionTypeEnum::SELL,
                'amount' => $this->sellAmount,
                'total_earnings' => $totalEarnings,
            ]);

            // Create User transaction - call WalletFunded Event
            event(new WalletFunded($user, $newBalance, $balance, $totalEarnings, TransactionType::DEPOSIT));

            // Commit the database transaction
            \DB::commit();

            session()->flash('success', 'Asset sold successfully.');
        } catch (\Exception $e) {
            // Rollback the database transaction on error
            \DB::rollback();

            session()->flash('error', 'Transaction failed. Please try again.' . $e->getMessage());
        }
    }
}
