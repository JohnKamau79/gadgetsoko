@extends('dashboard')

@section('dashboardNav')
    <a href="{{ route('profile.update') }}"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My Profile</a>
    <a href="{{ route('cart') }}" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My
        Cart</a>
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My Orders</a>
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My Product
        Reviews</a>
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 transition">My Website Reviews</a>
@endsection

@section('dashboardContent')
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
