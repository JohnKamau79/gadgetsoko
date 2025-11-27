@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-t transition">
        All
    </a>
    <a href="/dashboard?page=products"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Products
    </a>
    <a href="/dashboard?page=orders"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Orders
    </a>
    <a href="/dashboard?page=productReviews"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-b transition">
        Product Reviews
    </a>
@endsection

@section('dashboardContent')
    @yield('retailerDashboardContent')
@endsection
