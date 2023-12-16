<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>

        <x-flash :message="session('message')" />

        <form class="flex items-center">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <div class="grid justify-items-center;">

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                           S/N
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           Previous Balance
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           New Balance
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           Transaction Type
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           Transaction Reference
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                           Transaction Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaction->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $transaction->oldBalance }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->newBalance }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->reference }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->created_at }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div> 

                </div>

            </div>
        </div>

    </div>
    
</x-app-layout>