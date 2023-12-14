<?php

namespace App\Listeners;

use App\Events\WalletFunded;
use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CustomerFundWalletListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WalletFunded $event)
    {
        $user = $event->user;
        $newBalance = (string)$event->newBalance;
        $oldBalance = $event->oldBalance;
        $type = $event->type->value;
        $amount = $event->amount;

        // dd($user->id, $newBalance, $oldBalance, $amount, $type);
        // dd($newBalance, $amount, $oldBalance);

        $ref = Str::random(15);

        if($user->hasRole('user'))
        {
            Transaction::create([
                'oldBalance' => $oldBalance,
                'newBalance' => $newBalance,
                'amount'     => $amount,
                'type'       => $type,
                'reference'  => $ref,
                'user_id'    => $user->id
            ]);
        }
    }
}
