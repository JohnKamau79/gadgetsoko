@extends('admin.admin-dashboard')

@section('adminDashboardContent')
    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Products</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalAdminProducts }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Orders</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalAdminOrders }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Users</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalUsers }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Retailers</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalUsers }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Admins</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalAdmins }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Website Reviews</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalAdminWebsiteReviews }}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Product Reviews</p>
            <p class="text-2xl font-bold text-blue-800">{{ $totalAdminProductReviews }}</p>
        </div>
    </div>
@endsection
