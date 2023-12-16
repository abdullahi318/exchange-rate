<div>
    <h1>Currency Exchange</h1>

    <!-- Buy form -->
    <div>
        <h2>Buy Coins</h2>

        <label for="buyCoinId">Select Coin:</label>
        <select wire:model="buyCoinId" id="buyCoinId">
            @foreach($coins as $coin)
                <option value="{{ $coin->id }}">{{ $coin->name }}</option>
            @endforeach
        </select>
        @error('buyCoinId') <span>{{ $message }}</span> @enderror

        <label for="buyAmount">Buy Amount:</label>
        <input type="number" wire:model="buyAmount" id="buyAmount" placeholder="Enter buy amount">
        @error('buyAmount') <span>{{ $message }}</span> @enderror

        <button wire:click="buy" type="button">Buy</button>
    </div>
</div>