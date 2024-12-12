<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Supplier') }}
        </h2>
    </x-slot>

    <form class="max-w-sm mx-auto mt-10" method="post" action="{{ route('suppliers.update', ['supplier' => $supplier->id]) }}">
        @method('put')
        @csrf
        <div class="mb-5">
        <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Name</label>
        <input type="text" id="company_name" name="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('company_name') is-invalid @enderror" placeholder="supplier" required autofocus value="{{ old('company_name', $supplier->company_name) }}" />
        @error('company_name')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>
          
        <div class="mb-5">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Address</label>
        <textarea rows="3" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('address') is-invalid @enderror" placeholder="Address" required>{{ old('address', $supplier->address) }}
        </textarea>
        @error('address')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Phone</label>
        <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('phone') is-invalid @enderror" placeholder="08123456789" required value="{{ old('phone', $supplier->phone) }}"/>
        @error('phone')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') is-invalid @enderror" placeholder="example@example.com" required value="{{ old('email', $supplier->email) }}"/>
        @error('email')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
    </form>
   
</x-app-layout>
