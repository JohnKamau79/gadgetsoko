@extends('retailer.retailer-dashboard')
@section('retailerDashboardContent')

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

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

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Name</label>
                <input type="text" value="{{ old('title', $product->title) }}" name="title"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Category</label>
                <input type="text" value="{{ old('category', $product->category) }}" name="category"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}
                </textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Price</label>
                <input type="number" value="{{ old('price', $product->price) }}" name="price" step="0.01"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Image</label>

                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="h-20 mb-2 rounded">
                @endif

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
