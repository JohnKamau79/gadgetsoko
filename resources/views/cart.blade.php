@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-12 bg-white p-6 rounded-lg shadow-lg">

    <h2 class="text-2xl font-semibold mb-6">Your Cart</h2>

    @if ($cartItems->isEmpty())
        <p class="text-gray-600">Your cart is empty.</p>
    @else
        <div class="space-y-6">
            @foreach ($cartItems as $item)
                <div class="flex flex-col md:flex-row items-center justify-between border-b pb-4">
                    
                    <!-- Product Info -->
                    <div class="flex items-center gap-4 w-full md:w-2/3">
                        @if ($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                 alt="{{ $item->product->title }}"
                                 class="w-24 h-24 object-cover rounded">
                        @endif
                        <div>
                            <h3 class="text-lg font-medium">{{ $item->product->title }}</h3>
                            <p class="text-gray-800 font-semibold mt-1">$ {{ number_format($item->product->price, 2) }}</p>
                        </div>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-2 mt-4 md:mt-0">

                        <!-- Increment -->
                        <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded hover:bg-gray-300">
                                -
                            </button>
                        </form>

                        <span class="px-4 text-gray-700 font-semibold">{{ $item->quantity }}</span>

                        <!-- Decrement -->
                        <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded hover:bg-gray-300">
                                +
                            </button>
                        </form>

                    </div>

                    <!-- Remove Button -->
                    <form action="{{ route('cart.removeCartItem', $item->id) }}" method="POST" class="mt-4 md:mt-0">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Remove
                        </button>
                    </form>

                </div>
            @endforeach
        </div>

        <!-- Total & Checkout -->
        <div class="mt-8 flex flex-col md:flex-row items-center justify-between">
            <h3 class="text-xl font-semibold">
                Total: $ {{ number_format($cartItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}
            </h3>

            <a href="{{ route('checkout') }}" class="mt-4 md:mt-0 px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700">
                Checkout
            </a>
        </div>
    @endif

</div>
@endsection
