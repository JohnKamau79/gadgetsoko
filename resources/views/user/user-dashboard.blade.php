@extends('dashboard')

@section('dashboardNav')
    <a href="/dashboard?page=all"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-t transition">
        All
    </a>
    <a href="{{ route('profile.update') }}"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        My Profile
    </a>
    <a href="{{ route('cart') }}"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        My Cart
    </a>
    <a href="/dashboard?page=orders"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        My Orders
    </a>
    <a href="/dashboard?page=productReviews"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium transition">
        My Product Reviews
    </a>
    <a href="/dashboard?page=websiteReviews"
        class="block p-3 bg-gradient-to-r from-teal-600 to-indigo-700 hover:from-teal-500 hover:to-indigo-600 text-white font-medium rounded-b transition">
        My Website Reviews
    </a>
@endsection

@section(section: 'dashboardContent')
    @yield('userDashboardContent')
@endsection
