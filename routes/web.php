<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CoinTransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\CurrencyExchange;
use App\Http\Livewire\BuyCoins;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('homes',   HomeController::class);
    Route::resource('markets', MarketController::class);
    // Route::resource('wallets', WalletController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('coin-transactions', CoinTransactionController::class);

    Route::controller(CoinTransactionController::class)->group(function () {
        Route::get('coins/buy/{coin}', 'buyForm')->name('coins.buy.form');
        Route::get('coins/buy/', 'buy')->name('coins.buy');
        Route::get('coins/sell/{coin}', 'sell')->name('coins.sell.form');
        Route::get('coins/sell', 'sell')->name('coins.sell');
    });

    Route::group(['middleware' => ['can:access-admin']], function () {
        Route::resource('coins', CoinController::class);
        Route::resource('users', UserController::class);
    });

    Route::controller(WalletController::class)->group(function () {
        Route::get('/wallets', 'index')->name('wallets.index');
        Route::get('/wallets/create', 'create')->name('wallets.create');
        Route::post('/wallets', 'store')->name('wallets.store');

        Route::get('/wallets/{type}/edit', 'edit')->name('wallets.edit');
        Route::put('/wallets/{type}', 'update')->name('wallets.update');
    });

    Route::resource('exchange-rates', ExchangeRateController::class);

    Route::get('/currency-exchange', CurrencyExchange::class);
    Route::get('/buy-coins', BuyCoins::class);

});

require __DIR__.'/auth.php';
