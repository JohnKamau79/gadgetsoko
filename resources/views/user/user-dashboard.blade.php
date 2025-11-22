@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">All</a>
    <a href="{{ route('profile.update') }}"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My Profile</a>
    <a href="{{ route('cart') }}" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My
        Cart</a>
    <a href="/dashboard?page=orders" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My
        Orders</a>
    <a href="/dashboard?page=productReviews"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">My Product
        Reviews</a>
    <a href="/dashboard?page=websiteReviews" class="block p-3 bg-gray-700 hover:bg-gray-600 transition">My Website
        Reviews</a>
@endsection
@section('dashboardContent')
    @yield('userDashboardContent')
@endsection
