@extends('retailer.retailer-dashboard')

@section('retailerDashboardContent')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

    {{-- My Products --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">My Products</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{$totalRetailerProducts}}</p>
    </div>

    {{-- Customer Orders --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Customer Orders</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{$totalRetailerOrders}}</p>
    </div>

    {{-- Customer Product Reviews --}}
    <div class="bg-gradient-to-r from-teal-100 to-indigo-100 dark:from-teal-700 dark:to-indigo-900 p-6 rounded-xl shadow hover:shadow-xl transition">
        <p class="text-teal-600 dark:text-teal-300 font-semibold">Customer Product Reviews</p>
        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mt-2">{{$totalRetailerProductReviews}}</p>
    </div>

</div>
@endsection
