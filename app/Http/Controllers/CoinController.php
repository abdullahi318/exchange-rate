<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCoinRequest;
use App\Http\Requests\UpdateCoinRequest;
use App\Models\Coin;


class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $coins = Coin::latest()->paginate(5);    
            return view('coins.index', ['coins' => $coins]);

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('coins.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoinRequest $request)
        {
            $validated = $request->validated();

            Coin::create($validated);

            return redirect()->route('coins.index')->withSuccess('Asset added.');
        }

    /**
     * Display the specified resource.
     */
    public function show(Coin $coin)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coin $coin)
        {
            return view('coins.edit', [
                'coin' => $coin
            ]);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoinRequest $request, Coin $coin)
        {
            $coin->update($request->validated());

            return redirect()->route('coins.index')->with('message', 'Asset updated successfully.')->withInput();
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coin $coin)
        {
            $coin->delete();

            return redirect()->route('coins.index')->with('message', 'Asset deleted successfully.')->withInput(); 
        }
}
