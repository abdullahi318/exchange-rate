<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;


class WalletFunded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $newBalance;
    public $oldBalance;
    public $amount;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $newBalance, $oldBalance, $amount, $type)
    {
        $this->user = $user;
        $this->newBalance = $newBalance;
        $this->oldBalance = $oldBalance;
        $this->amount = $amount;
        $this->type = $type;

        // dd($this->user, $this->oldBalance, $this->amount, $this->newBalance, $this->type);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
