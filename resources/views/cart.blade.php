@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-12 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">

    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Your Cart</h2>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 dark:bg-green-700 text-green-800 dark:text-green-200 p-3 rounded mb-4"
             x-data="{ show: true }" x-show="show" x-transition
             x-init="setTimeout(() => show = false, 4000)">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 dark:bg-red-700 text-red-800 dark:text-red-200 p-3 rounded mb-4"
             x-data="{ show: true }" x-show="show" x-transition
             x-init="setTimeout(() => show = false, 4000)">
            {{ session('error') }}
        </div>
    @endif

    @if ($cartItems->isEmpty())
        <p class="text-gray-600 dark:text-gray-300">Your cart is empty.</p>
    @else
        <div class="space-y-6">
            @foreach ($cartItems as $item)
                <div class="flex flex-col md:flex-row items-center justify-between border-b border-gray-200 dark:border-gray-700 pb-4 gap-4">

                    <!-- Product Info -->
                    <div class="flex items-center gap-4 w-full md:w-2/3">
                        @if ($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->title }}"
                                class="w-24 h-24 object-cover rounded-lg shadow-sm">
                        @endif
                        <div>
                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $item->product->title }}</h3>
                            <p class="text-gray-800 dark:text-gray-200 font-semibold mt-1">Ksh {{ number_format($item->product->price, 2) }}</p>
                        </div>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-2 mt-4 md:mt-0">
                        <!-- Decrement -->
                        <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                -
                            </button>
                        </form>

                        <span class="px-4 text-gray-700 dark:text-gray-200 font-semibold">{{ $item->quantity }}</span>

                        <!-- Increment -->
                        <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                +
                            </button>
                        </form>
                    </div>

                    <!-- Remove Button -->
                    <form action="{{ route('cart.removeCartItem', $item->id) }}" method="POST" class="mt-4 md:mt-0">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 dark:bg-red-600 text-white rounded hover:bg-red-600 dark:hover:bg-red-500 transition">
                            Remove
                        </button>
                    </form>

                </div>
            @endforeach
        </div>

        <!-- Total & Checkout -->
        <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                Total: Ksh {{ number_format($cartItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}
            </h3>

            <a href="{{ route('checkout') }}"
                class="px-6 py-3 bg-green-600 dark:bg-green-500 text-white rounded-lg hover:bg-green-700 dark:hover:bg-green-400 font-semibold transition">
                Checkout
            </a>
        </div>
    @endif

</div>
@endsection
