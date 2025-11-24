@extends('retailer.retailer-dashboard')
@section('retailerDashboardContent')
    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Products</p>
            <p class="text-2xl font-bold text-blue-800">{{$totalRetailerProducts}}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Customer Orders</p>
            <p class="text-2xl font-bold text-blue-800">{{$totalRetailerOrders}}</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Customer Product Reviews</p>
            <p class="text-2xl font-bold text-blue-800">{{$totalRetailerProductReviews}}</p>
        </div>
    </div>

    {{-- Placeholder for additional content --}}
    <div class="bg-gray-50 p-6 rounded shadow">
        <p class="text-gray-600">Additional dashboard content or charts can go here.</p>
    </div>
@endsection
