<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use App\Models\Market;
use App\Models\Coin;
// use App\Models\Wallet;



class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = \Auth::user();
        $coins  = Coin::get();
        
        $wallet = $user?->wallets()->first();

        $balance = 0;

        if($user->hasRole('user')) {
           if($wallet) {
            $balance = $wallet->balance;
           } 
        }
            
        return view('markets.index', compact('coins', 'balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('coins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarketRequest $request)
    {
        // $validated = $request->validated();

        // Market::create($validated);

        // return redirect()->route('markets.index')->withSuccess('markets added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Market $market)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
        {
            // return view('markets.edit', [
            //     'market' => $market
            // ]);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarketRequest $request, Market $market)
        {
            // $market->update($request->validated());

            // return redirect()->route('markets.index')->with('message', 'market updated successfully.')->withInput();
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
        {
            // $market->delete();

            // return redirect()->route('markets.index')->with('message', 'Market deleted successfully.')->withInput(); 
        }
}
