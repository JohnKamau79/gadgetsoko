@extends('retailer.retailer-dashboard')

@section('retailerDashboardContent')

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-blue-700">My Product Reviews</h1>

        <div class="bg-white shadow-lg rounded p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-3">Product</th>
                        <th class="text-left p-3">Rating</th>
                        <th class="text-left p-3">Review</th>
                        <th class="text-left p-3">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($retailerProductReviews as $product)
                        @foreach ($product->reviews as $review)
                            <tr class="border-b">
                                <td class="p-3">{{ $product->title ?? 'Product Deleted' }}</td>
                                <td class="p-3">{{ $review->rating }}/5</td>
                                <td class="p-3">{{ $review->comment }}</td>
                                <td class="p-3">{{ $review->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach

                    @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">
                                You have not reviewed any products yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

@endsection
