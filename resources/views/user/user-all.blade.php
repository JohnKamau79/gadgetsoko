@extends('user.user-dashboard')
@section('userDashboardContent')
    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Cart Items</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalCartItems }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Orders</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalOrders }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Product Reviews</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalProductReviews }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Website Reviews</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalWebsiteReviews }}</p>
        </div>
    </div>

    {{-- Placeholder for additional content --}}
    <div class="bg-gray-50 p-6 rounded shadow">
        <p class="text-gray-600">Additional user info, charts, or links can go here.</p>
    </div>
@endsection