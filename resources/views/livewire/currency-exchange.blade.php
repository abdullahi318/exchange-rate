<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Currency Exchange</h1>

    <!-- Buy form -->
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">Buy Coins</h2>

        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="buyCoinId" class="block text-sm font-semibold text-gray-700">Select Coin:</label>
                <select wire:model="buyCoinId" id="buyCoinId" class="w-full border px-3 py-2 rounded">
                    <option value="" selected>Select a coin</option>
                    @foreach($coins as $coin)

                        <option value="{{ $coin->id }}">{{ $coin->name }}</option>
                    @endforeach
                </select>
                @error('buyCoinId') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="w-1/2">
                <label for="buyAmount" class="block text-sm font-semibold text-gray-700">Buy Amount:</label>
                <input type="number" wire:model="buyAmount" id="buyAmount" placeholder="Enter buy amount"
                    class="w-full border px-3 py-2 rounded">
                @error('buyAmount') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <button wire:click="buy" type="button" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Buy</button>
    </div>

    <!-- Sell form -->
    <div>
        <h2 class="text-xl font-bold mb-4">Sell Coins</h2>

        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="sellCoinId" class="block text-sm font-semibold text-gray-700">Select Coin:</label>
                <select wire:model="sellCoinId" id="sellCoinId" class="w-full border px-3 py-2 rounded">
                    @foreach($coins as $coin)
                        <option value="{{ $coin->id }}">{{ $coin->name }}</option>
                    @endforeach
                </select>
                @error('sellCoinId') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="w-1/2">
                <label for="sellAmount" class="block text-sm font-semibold text-gray-700">Sell Amount:</label>
                <input type="number" wire:model="sellAmount" id="sellAmount" placeholder="Enter sell amount"
                    class="w-full border px-3 py-2 rounded">
                @error('sellAmount') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <button wire:click="sell" type="button" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Sell</button>
    </div>

    <!-- Display success/error messages if any -->
    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @elseif (session()->has('error'))
        <div class="mt-4 text-red-500">{{ session('error') }}</div>
    @endif
</div>
