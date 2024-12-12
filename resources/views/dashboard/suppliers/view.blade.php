<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Supplier') }}
        </h2>
    </x-slot>

    <form class="max-w-sm mx-auto mt-10">
        <div class="mb-5">
        <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Name</label>
        <input type="text" id="company_name" name="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('company_name') is-invalid @enderror" disabled value="{{ $supplier->company_name }}" />
        </div>
                  
        <div class="mb-5">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Address</label>
        <textarea rows="3" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('address') is-invalid @enderror">{{ $supplier->address }}
        </textarea>
        @error('address')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Phone</label>
        <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('phone') is-invalid @enderror" value="{{ $supplier->phone }}"/>
        @error('phone')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') is-invalid @enderror" value="{{ $supplier->email }}"/>
        @error('email')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>
        <a href="{{ route('suppliers.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Back</a>
    </form>
   
</x-app-layout>
