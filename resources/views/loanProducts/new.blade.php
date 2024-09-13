<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Loan Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('loanproducts/create/save') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Code -->
                    <div class="mt-4">
                        <x-input-label for="code" :value="__('Code')" />
                        <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autocomplete="code" />
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>

                    <!-- Min Amount -->
                    <div class="mt-4">
                        <x-input-label for="min_amount" :value="__('Minimum Amount')" />
                        <x-text-input id="min_amount" class="block mt-1 w-full" type="text" name="min_amount" :value="old('min_amount')" required autocomplete="min_amount" />
                        <x-input-error :messages="$errors->get('min_amount')" class="mt-2" />
                    </div>

                    <!-- Max Amount -->
                    <div class="mt-4">
                        <x-input-label for="max_amount" :value="__('Max Amount')" />
                        <x-text-input id="max_amount" class="block mt-1 w-full" type="text" name="max_amount" :value="old('max_amount')" required autocomplete="max_amount" />
                        <x-input-error :messages="$errors->get('max_amount')" class="mt-2" />
                    </div>

                    <!-- Interest -->
                    <div class="mt-4">
                        <x-input-label for="interest_rate" :value="__('Interest')" />
                        <x-text-input id="interest_rate" class="block mt-1 w-full" type="text" name="interest_rate" :value="old('interest_rate')" required autocomplete="interest_rate" />
                        <x-input-error :messages="$errors->get('interest_rate')" class="mt-2" />
                    </div>

                    <!-- Currency -->
                    <div class="mt-4">
                        <x-input-label for="currency_id" :value="__('Select Currency')" />
                        <select id="currency_id" name="currency_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->currency_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</x-app-layout>
