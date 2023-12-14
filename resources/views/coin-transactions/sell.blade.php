<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sell Coin') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('sell') }}" method="POST">
                    @csrf
                        <select name="currency_id" required>
                            <!-- Display available currencies -->
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="amount" placeholder="Amount" required>
                        <button type="submit">Sell</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>