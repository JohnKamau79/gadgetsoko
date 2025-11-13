@extends('layouts.app')

@section('title', 'Product-Page')

@section('content')

    <!-- FORM -->
    <section class="max-w-3xl mx-auto mt-16 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Product</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Name</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Category</label>
                <input type="text" name="category" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Price</label>
                <input type="number" name="price" step="0.01" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Image</label>
                <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition">
                    Add Product
                </button>
            </div>
        </form>
    </section>

@endsection
