@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">All</a>
    <a href="/dashboard?page=users"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Users</a>
    <a href="/dashboard?page=retailers"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Retailers</a>
    <a href="/dashboard?page=admins"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Admins</a>
    <a href="/dashboard?page=products"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Products</a>
    <a href="/dashboard?page=orders"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Orders</a>
    <a href="/dashboard?page=websiteReviews"
        class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Website
        Reviews</a>
    <a href="/dashboard?page=productReviews" class="block p-3 bg-gray-700 hover:bg-gray-600 transition">Product Reviews</a>
@endsection
@section('dashboardContent')
    @yield('adminDashboardContent')
@endsection
