@extends('admin.admin-dashboard')

@section('adminDashboardContent')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

    {{-- Products --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Products</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalAdminProducts }}</p>
    </div>

    {{-- Orders --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Orders</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalAdminOrders }}</p>
    </div>

    {{-- Users --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Users</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalUsers }}</p>
    </div>

    {{-- Retailers --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Retailers</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalRetailers }}</p>
    </div>

    {{-- Admins --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Admins</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalAdmins }}</p>
    </div>

    {{-- Website Reviews --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Website Reviews</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalAdminWebsiteReviews }}</p>
    </div>

    {{-- Product Reviews --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Product Reviews</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{ $totalAdminProductReviews }}</p>
    </div>

</div>
@endsection
