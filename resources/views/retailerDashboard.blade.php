@extends('dashboard')


@section('dashboardNav')
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Products</a>
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 border-b border-gray-600 transition">Orders</a>
    <a href="#" class="block p-3 bg-gray-700 hover:bg-gray-600 transition">Product Reviews</a>
@endsection

@section('dashboardContent')
    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Profile</p>
            <p class="text-2xl font-bold text-blue-800">120</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">My Products</p>
            <p class="text-2xl font-bold text-blue-800">120</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Orders</p>
            <p class="text-2xl font-bold text-blue-800">320</p>
        </div>
        <div class="bg-blue-50 p-4 rounded shadow">
            <p class="text-blue-600">Product Reviews</p>
            <p class="text-2xl font-bold text-blue-800">1,024</p>
        </div>
    </div>

    {{-- Placeholder for additional content --}}
    <div class="bg-gray-50 p-6 rounded shadow">
        <p class="text-gray-600">Additional dashboard content or charts can go here.</p>
    </div>
@endsection
