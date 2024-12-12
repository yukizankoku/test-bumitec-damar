<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Sparepart') }}
        </h2>
    </x-slot>

    <form class="max-w-sm mx-auto mt-10">
        <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') is-invalid @enderror" autofocus disabled value="{{ old('name', $sparepart->name) }}" />
        @error('name')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>
            
        <div class="mb-5">
        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
        <input type="text" rows="3" id="code" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('code') is-invalid @enderror" disabled value="{{ old('code', $sparepart->code) }}"/>
        @error('code')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') is-invalid @enderror" disabled value="{{ old('price', $sparepart->price) }}"/>
        @error('price')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror

        <div class="mb-5">
        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
        <input type="number" id="quantity" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('quantity') is-invalid @enderror" disabled value="{{ old('quantity', $sparepart->quantity) }}"/>
        @error('quantity')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea type="text" rows="3" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('description') is-invalid @enderror" disabled>{{ old('description', $sparepart->description) }}</textarea>

        @error('description')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-5">
        <label for="supplier_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
        <select id="supplier_id" name="supplier_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            <option selected>{{ $sparepart->supplier->company_name }}</option>
        </select>
        </div>

        <div class="mb-5">
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            <option selected>{{ $sparepart->category->name }}</option>
        </select>
        </div>

        <a href="{{ route('spareparts.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Back</a>
    </form>
   
</x-app-layout>
