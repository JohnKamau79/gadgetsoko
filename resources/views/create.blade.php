@extends('layouts.app')

@section('title', 'Product-Page')

@section('content')

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 dark:bg-green-700 text-green-800 dark:text-green-200 p-3 rounded mb-4"
             x-data="{ show: true }" x-show="show" x-transition
             x-init="setTimeout(() => show = false, 4000)">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 dark:bg-red-700 text-red-800 dark:text-red-200 p-3 rounded mb-4"
             x-data="{ show: true }" x-show="show" x-transition
             x-init="setTimeout(() => show = false, 4000)">
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM -->
    <section class="max-w-3xl mx-auto mt-16 bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200">Add New Product</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 dark:bg-red-700 text-red-700 dark:text-red-200 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Product Name</label>
                <input type="text" name="title"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Category</label>
                <input type="text" name="category"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Price</label>
                <input type="number" name="price" step="0.01"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Product Image</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none transition">
            </div>

            <div>
                <button type="submit"
                        class="bg-teal-600 dark:bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-500 dark:hover:bg-teal-400 transition font-semibold">
                    Add Product
                </button>
            </div>
        </form>
    </section>

@endsection
