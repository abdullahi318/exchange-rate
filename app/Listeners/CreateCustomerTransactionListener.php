<?php

namespace App\Listeners;

use App\Events\TransactionMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCustomerTransactionListener
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
     * @param  \App\Events\TransactionMade  $event
     * @return void
     */
    public function handle(TransactionMade $event)
    {
        //
    }
}
