<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wallet') }}
        </h2>
    </x-slot>

    <div class="py-2 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('wallets.update', ['type' => $type]) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="balance" class="block mb-2 text-md font-bold text-center rounded-md bg-blue-700 hover:bg-blue-800 text-white px-2.5 py-2.5 font-medium text-gray-900 dark:text-white mt-5 mb-4">{{ $type === \App\Enums\TransactionType::DEPOSIT ? 'Fund Wallet' : 'Withrawal' }}</label>
                            <input type="text" name="balance" id="balance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter amount" required>
                            @error('balance')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-5">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>