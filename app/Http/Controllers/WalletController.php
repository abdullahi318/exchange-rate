<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Events\WalletFunded;
use App\Enums\TransactionType;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        if($user->isAdmin())
        {
            $wallets = Wallet::latest()->paginate(10);

            return view('admin.wallets.index', compact('wallets'));
        }

        $balance = 0;

        $wallet = Wallet::where('user_id', $user->id)->first();

        if($wallet) {
            $balance = $wallet->balance;
        }

        return view('wallets.index', [
            'balance' => $balance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWalletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletRequest $request)
    {
        DB::transaction(function() use($request) {

            $user = \Auth::user();

            $wallet = $user->wallets()->first();
            
            $validated = $request->validated();

            $validated['user_id'] = $user->id;

            $wallet = Wallet::create($validated);

            $oldBalance = 0;

            $amount = $request->balance;

            $newBalance = $oldBalance + $amount;

            $type = TransactionType::DEPOSIT;

            event(new WalletFunded($user, $newBalance, $oldBalance, $amount, $type));
        });

        return redirect()->route('wallets.index')->with('success', 'Wallet created successefull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $type)
    {
        return view('wallets.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletRequest  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletRequest $request, TransactionType $type)
    {
        DB::transaction(function() use($request, $type) {

            $user = \Auth::user();

            $wallet = $user->wallets()->first();

            $oldBalance = $wallet->balance;

            $amount = $request->balance;

            $newBalance = "";
        
            if($type && $type === TransactionType::DEPOSIT) {
                $wallet->balance += $request->balance;
                $newBalance = $oldBalance + $amount;
               
            } else if($type && $type === TransactionType::WITHDRAWAL) {
                $wallet->balance -= $request->balance;
                $newBalance = $oldBalance - $amount;
            }

            // dd($oldBalance, $newBalance, $amount);

            $wallet->save();            

            event(new WalletFunded($user, $newBalance, $oldBalance, $amount, $type));
        });

        return redirect()->route('wallets.index')->with('success', 'Wallet deposited/withdrawn successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
