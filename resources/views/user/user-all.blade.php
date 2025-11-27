@extends('user.user-dashboard')
@section('userDashboardContent')
    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-4 rounded-xl shadow hover:shadow-xl transition">
            <p class="text-teal-600 dark:text-teal-300 font-semibold">My Cart Items</p>
            <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">{{ $totalCartItems }}</p>
        </div>
        <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-4 rounded-xl shadow hover:shadow-xl transition">
            <p class="text-teal-600 dark:text-teal-300 font-semibold">My Orders</p>
            <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">{{ $totalOrders }}</p>
        </div>
        <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-4 rounded-xl shadow hover:shadow-xl transition">
            <p class="text-teal-600 dark:text-teal-300 font-semibold">My Product Reviews</p>
            <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">{{ $totalProductReviews }}</p>
        </div>
        <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-4 rounded-xl shadow hover:shadow-xl transition">
            <p class="text-teal-600 dark:text-teal-300 font-semibold">My Website Reviews</p>
            <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">{{ $totalWebsiteReviews }}</p>
        </div>
    </div>
@endsection
