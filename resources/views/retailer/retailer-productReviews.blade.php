@extends('retailer.retailer-dashboard')

@section('retailerDashboardContent')

<div class="p-6">
    <h1 class="text-3xl font-bold mb-6 text-teal-600 dark:text-teal-400">My Product Reviews</h1>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-teal-100 dark:bg-teal-700">
                    <th class="text-left p-3 text-teal-800 dark:text-white">Product</th>
                    <th class="text-left p-3 text-teal-800 dark:text-white">Rating</th>
                    <th class="text-left p-3 text-teal-800 dark:text-white">Review</th>
                    <th class="text-left p-3 text-teal-800 dark:text-white">Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($retailerProductReviews as $product)
                    @foreach ($product->reviews as $review)
                        <tr class="border-b bg-white dark:bg-gray-900 hover:bg-teal-50 dark:hover:bg-gray-700 transition">
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $product->title ?? 'Product Deleted' }}</td>
                            <td class="p-3 font-semibold text-gray-800 dark:text-gray-100">{{ $review->rating }}/5</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->comment }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500 dark:text-gray-400">
                            You have not reviewed any products yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
