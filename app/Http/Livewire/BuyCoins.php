<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuyCoins extends Component
{
    public $amount;
    public $selectedCoin;
    public $buyingPrice;

    protected $listeners = ['calculateBuyingPrice'];

    public function render()
    {
        return view('livewire.buy-coins');
    }

    public function calculateBuyingPrice()
    {
        $coin = Coin::find($this->selectedCoin);
        $exchangeRate = $coin->exchange_rate;

        if (!is_null($this->amount) && is_numeric($this->amount) && is_numeric($exchangeRate)) {
            $this->buyingPrice = number_format($this->amount * $exchangeRate, 2);
        } else {
            $this->buyingPrice = null;
        }
    }
}
