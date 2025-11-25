@extends('user.user-dashboard')

@section('userDashboardContent')
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

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-blue-700">My Orders</h1>

        <div class="bg-white shadow-lg rounded p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-3">Order #</th>
                        <th class="text-left p-3">Total Amount</th>
                        <th class="text-left p-3">Status</th>
                        <th class="text-left p-3">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-b">
                            <td class="p-3">{{ $order->id }}</td>
                            <td class="p-3">KSh {{ number_format($order->total) }}</td>
                            <td class="p-3">{{ ucfirst($order->status) }}</td>
                            <td class="p-3">{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">
                                You have no orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
