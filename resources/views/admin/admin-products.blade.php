@extends('admin.admin-dashboard')

@section('adminDashboardContent')
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

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-teal-600 dark:text-teal-400">Products Management</h1>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-teal-100 dark:bg-teal-700">
                        <th class="text-left p-3 text-teal-800 dark:text-white">Name</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Price</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Stock</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Retailer</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Added On</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($adminProducts as $product)
                        <tr class="border-b bg-white dark:bg-gray-900 hover:bg-teal-50 dark:hover:bg-gray-700 transition">
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $product->title }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">${{ number_format($product->price, 2) }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $product->quantity ?? 'N/A' }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $product->user->firstName ?? 'user' }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $product->created_at->format('Y-m-d') }}</td>

                            <td class="p-3 flex gap-2">
                                {{-- Delete Button --}}
                                <form action="{{ route('products.delete', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Remove this product?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                        Remove Product
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500 dark:text-gray-400">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
