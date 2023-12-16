<div class="mt-6 p-4 bg-white border rounded shadow-md">
    <label for="coin" class="block mb-2 text-gray-700">Select Coin:</label>
    <select wire:model="selectedCoin" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">
        @foreach ($coins as $coin)
            <option value="{{ $coin->id }}">{{ $coin->name }}</option>
        @endforeach
    </select>

    <label for="amount" class="block mt-4 mb-2 text-gray-700">Enter Amount:</label>
    <input type="number" wire:model="amount" min="0" step="0.01" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">

    <label for="buyingPrice" class="block mt-4 mb-2 text-gray-700">Buying Price:</label>
    <input type="text" wire:model="buyingPrice" readonly class="w-full p-2 border rounded focus:outline-none bg-gray-100">

    <button wire:click="calculateBuyingPrice" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none">Calculate Buying Price</button>
</div>
