@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-t transition">
        All
    </a>
    <a href="/dashboard?page=users"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Users
    </a>
    <a href="/dashboard?page=retailers"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Retailers
    </a>
    <a href="/dashboard?page=admins"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Admins
    </a>
    <a href="/dashboard?page=products"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Products
    </a>
    <a href="/dashboard?page=orders"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Orders
    </a>
    <a href="/dashboard?page=websiteReviews"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        Website Reviews
    </a>
    <a href="/dashboard?page=productReviews"
       class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-b transition">
        Product Reviews
    </a>
@endsection

@section('dashboardContent')
    @yield(section: 'adminDashboardContent')
@endsection
