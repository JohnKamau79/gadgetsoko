@extends('admin.admin-dashboard')

@section('adminDashboardContent')
    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6 text-blue-700">Products Management</h1>

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

        <div class="bg-white shadow-lg rounded p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-3">Name</th>
                        <th class="text-left p-3">Price</th>
                        <th class="text-left p-3">Stock</th>
                        <th class="text-left p-3">Retailer</th>
                        <th class="text-left p-3">Added On</th>
                        <th class="text-left p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($adminProducts as $product)
                        <tr class="border-b">
                            <td class="p-3">{{ $product->title }}</td>
                            <td class="p-3">${{ number_format($product->price, 2) }}</td>
                            <td class="p-3">{{ $product->quantity ?? 'N/A' }}</td>
                            <td class="p-3">{{ $product->user_id }}</td>
                            <td class="p-3">{{ $product->created_at->format('Y-m-d') }}</td>

                            <td class="p-3 flex gap-2">


                                {{-- Delete Button --}}
                                <form action="{{ route('products.delete', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Remove this product?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Remove Product
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
