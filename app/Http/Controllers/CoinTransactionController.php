<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;

use App\Services\ExchangeRateService;

class CoinTransactionController extends Controller
{
    public $exchangeRateService;

    public function __construct(ExchangeRateService $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    public function buyForm(Coin $coin)
    {
        // dd($coin->id);

        return view('coin-transactions.buy', compact('coin'));
    }

    public function buy(Request $request, Coin $coin)
    {
        dd($coin->id);
    }

    public function sellForm(Coin $coin)
    {
        dd($coin->id);
    }

    public function sell(Request $request, Coin $coin)
    {
        dd($coin->id);
    }
}
