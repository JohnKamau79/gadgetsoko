@extends('layouts.app')

@section('content')

@section('header')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
        {{ __('Welcome') }}, {{ ucfirst(Auth::user()->role) }} {{ Auth::user()->firstName }}
    </h2>
    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'retailer')
        <a href="{{ route('products.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded transition shadow-md hover:shadow-lg">
            + Add Product
        </a>
    @endif
</div>
@endsection

<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row min-h-[70vh] bg-gray-50 dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">

            {{-- Sidebar --}}
            <aside class="w-full md:w-60 bg-gray-800 dark:bg-gray-900 text-white flex flex-col">
                <div class="p-6 text-2xl font-bold border-b border-gray-700 dark:border-gray-700">
                    Menu
                </div>

                {{-- Links --}}
                <div class="flex-1 p-4 space-y-2 md:space-y-4 bg-gray-800 dark:bg-gray-900 overflow-y-auto">
                    @yield('dashboardNav')
                </div>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 p-6 md:p-8 bg-white dark:bg-gray-800 overflow-auto">
                @yield('dashboardContent')
            </main>

        </div>

    </div>
</div>

@endsection
