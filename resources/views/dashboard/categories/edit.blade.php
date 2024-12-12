<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Categories') }}
        </h2>
    </x-slot>

    <form class="max-w-sm mx-auto mt-10" method="post" action="{{ route('categories.update', ['category' => $category->id]) }}">
        @method('put')
        @csrf
        <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') is-invalid @enderror" placeholder="Category" required autofocus value="{{ old('name', $category->name) }}" />
        @error('name')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $message }}
            </div>
        @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
    </form>
   
</x-app-layout>
