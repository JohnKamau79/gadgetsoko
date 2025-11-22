@extends('admin.admin-dashboard')

@section('adminDashboardContent')

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6 text-blue-700">Orders Management</h1>

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
                    <th class="text-left p-3">Order ID</th>
                    <th class="text-left p-3">Customer</th>
                    <th class="text-left p-3">Email</th>
                    <th class="text-left p-3">Total Amount</th>
                    <th class="text-left p-3">Status</th>
                    <th class="text-left p-3">Date</th>
                    <th class="text-left p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($adminOrders as $order)
                    <tr class="border-b">
                        <td class="p-3">{{ $order->id }}</td>
                        <td class="p-3">{{ $order->user->firstName ?? 'Guest' }}</td>
                        <td class="p-3">{{ $order->user->email ?? 'N/A' }}</td>
                        <td class="p-3">${{ number_format($order->total, 2) }}</td>
                        <td class="p-3 capitalize">{{ $order->status }}</td>
                        <td class="p-3">{{ $order->created_at->format('Y-m-d') }}</td>

                        <td class="p-3 flex gap-2">
                            {{-- View Button --}}
                            <a href="#" 
                               class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                View
                            </a>

                            {{-- Delete Button --}}
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    onclick="return confirm('Remove this order?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="p-3 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
