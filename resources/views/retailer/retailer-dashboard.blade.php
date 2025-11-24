@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">All</a>
    <a href="/dashboard?page=products" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Products</a>
    <a href="/dashboard?page=orders" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Orders</a>
    <a href="/dashboard?page=productReviews" class="block p-3 bg-gray-700 hover:bg-gray-600 transition">Product Reviews</a>
@endsection
@section('dashboardContent')
    @yield('retailerDashboardContent')
@endsection