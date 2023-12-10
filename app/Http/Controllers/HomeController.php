<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Home;
use App\Models\Coin;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $coins = Coin::get();
        
        return view('homes.index', compact('coins'));

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            // return view('homes.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeRequest $request)
        {
            // $validated = $request->validated();

            // Home::create($validated);

            // return redirect()->route('homes.index')->withSuccess('homes added.');
        }

    /**
     * Display the specified resource.
     */
    public function show(Home $Home)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $Home)
        {
            // return view('homes.edit', [
            //     'Home' => $Home
            // ]);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $Home)
        {
            // $Home->update($request->validated());

            // return redirect()->route('homes.index')->with('message', 'Home updated successfully.')->withInput();
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $Home)
        {
            // $Home->delete();

            // return redirect()->route('homes.index')->with('message', 'Home deleted successfully.')->withInput(); 
        }
}
