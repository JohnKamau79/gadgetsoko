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
        <h1 class="text-3xl font-bold mb-6 text-teal-600 dark:text-teal-400">Product Reviews Management</h1>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-teal-100 dark:bg-teal-700">
                        <th class="text-left p-3 text-teal-800 dark:text-white">Product</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Reviewer</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Rating</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Comment</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Date</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($adminProductReviews as $review)
                        <tr class="border-b bg-white dark:bg-gray-900 hover:bg-teal-50 dark:hover:bg-gray-700 transition">
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->product->title ?? 'N/A' }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->user->firstName ?? 'Guest' }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->rating }}/5</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->comment }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $review->created_at->format('Y-m-d') }}</td>
                            <td class="p-3">
                                <form action="{{ route('productReview.delete', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Remove this review?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500 dark:text-gray-400">
                                No product reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
