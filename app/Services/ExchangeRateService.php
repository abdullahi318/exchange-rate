<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;

use App\Enums\CoinTransactionType;

class ExchangeRateService
{
    // Buy asset
    public function buy(Request $request)
    {
        // Validate request
        $request->validate([
            'coin_id' => 'required|exists:coins,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Perform the buying logic
        $currency = Coin::find($request('coin_id'));
        $amount = $request('amount');
        $user = auth()->user();

        // Calculate total cost based on currency exchange rate or other factors
        $totalCost = $amount * $currency->exchange_rate;

        // Check if the user has enough balance
        if ($user->wallet()->balance < $totalCost) {
            return redirect()->back()->with('error', 'Insufficient funds.');
        }

        // Start the database transaction
        DB::beginTransaction();

        try {
            // Deduct the amount from the user's wallet balance
            $user->wallet()->balance -= $totalCost;
            $user->save();

            // Create a buy transaction
            $transaction = Transaction::create([
                'type' => CoinTransactionType::BUY,
                'amount' => $amount,
                'total_cost' => $totalCost,
            ]);

            $currency->transactions()->save($transaction);
            $user->transactions()->save($transaction);

            // Commit the database transaction
            DB::commit();

            return redirect()->back()->with('success', 'Asset bought successfully.');
        } catch (\Exception $e) {
            // Rollback the database transaction on error
            DB::rollback();

            return redirect()->back()->with('error', 'Transaction failed. Please try again.');
        }
    }
 
    // Sell asset
    public function sell(Request $request)
    {
        // Validate request
        $request->validate([
            'coin_id' => 'required|exists:coins,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Perform the selling logic
        $currency = Coin::find($request->input('coin_id'));
        $amount = $request->input('amount');
        $user = auth()->user();

        // Calculate total earnings based on currency exchange rate or other factors
        $totalEarnings = $amount * $currency->exchange_rate;

        // Start the database transaction
        DB::beginTransaction();

        try {
            // Add the earnings to the user's wallet balance
            $user->wallet()->balance += $totalEarnings;
            $user->save();

            // Create a sell transaction
            $transaction = Transaction::create([
                'type' => CoinTransactionType::SELL,
                'amount' => $amount,
                'total_earnings' => $totalEarnings,
            ]);

            $currency->transactions()->save($transaction);
            $user->transactions()->save($transaction);

            // Commit the database transaction
            DB::commit();

            return redirect()->back()->with('success', 'Asset sold successfully.');
        } catch (\Exception $e) {
            // Rollback the database transaction on error
            DB::rollback();

            return redirect()->back()->with('error', 'Transaction failed. Please try again.');
        }
    }
}