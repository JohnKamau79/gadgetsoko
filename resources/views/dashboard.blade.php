@extends('layouts.app')

@section('content')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Welcome') }}, {{ ucfirst(Auth::user()->role) }} {{ Auth::user()->firstName }}
        </h2>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'retailer')
            <a href="{{ route('products.create') }}"
                class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded transition">
                + Add Product
            </a>
        @endif
    </div>
@endsection

<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-6">

        <div class="flex min-h-[70vh] bg-gray-50 rounded-lg overflow-hidden shadow-lg">

            {{-- Sidebar --}}
            <aside class="w-60 bg-gray-800 text-white flex flex-col">
                <div class="p-6 text-2xl font-bold border-b border-gray-700">
                    Menu
                </div>

                {{-- Links --}}
                <div class="flex-1 p-4 bg-gray-800">
                    @yield('dashboardNav')
                </div>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 p-8 bg-white">
                @yield('dashboardContent')
            </main>

        </div>

    </div>
</div>

@endsection
