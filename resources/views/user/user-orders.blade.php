@extends('user.user-dashboard')

@section('userDashboardContent')
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
        <h1 class="text-3xl font-bold mb-6 text-teal-600 dark:text-teal-400">My Orders</h1>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-teal-100 dark:bg-teal-700">
                        <th class="text-left p-3 text-teal-800 dark:text-white">Order #</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Total Amount</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Status</th>
                        <th class="text-left p-3 text-teal-800 dark:text-white">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-b bg-white dark:bg-gray-900 hover:bg-teal-50 dark:hover:bg-gray-700 transition">
                            <td class="p-3 font-semibold text-gray-800 dark:text-gray-100">{{ $order->id }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">KSh {{ number_format($order->total) }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100 capitalize">{{ $order->status }}</td>
                            <td class="p-3 text-gray-800 dark:text-gray-100">{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500 dark:text-gray-400">
                                You have no orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
