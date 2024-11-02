<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach (Auth::user()->roles as $role)
                    @if ($role->name == "admin")
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">
                       @csrf

                       <input type="text" name="name" placeholder="Enter Your Product name"
                           class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                       <input type="text" name="description" placeholder="Enter Your Product description"
                           class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                       <label for="file">Add file :</label>
                       <input type="file" name="file" accept="application/pdf"
                           class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                       <label for="image">Add Image :</label>
                       <input type="file" name="image" accept="image/*"
                           class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                       <button type="submit"
                           class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                           Add
                       </button>
                   </form>
                        
                    @endif
                @endforeach
                        
                    <a href="{{ route('product') }}">Show Products</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
