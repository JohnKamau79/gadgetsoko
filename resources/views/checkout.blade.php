@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-4xl mx-auto my-12 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
    
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

    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Checkout</h2>

    @if ($cartItems->isEmpty())
        <p class="text-gray-600 dark:text-gray-300">Your cart is empty.</p>
    @else
        <!-- Cart Items -->
        <div class="space-y-4 mb-6">
            @foreach ($cartItems as $item)
                <div class="flex flex-col md:flex-row items-center justify-between border-b border-gray-200 dark:border-gray-700 pb-4 gap-4">
                    <div class="flex items-center gap-4">
                        @if ($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->title }}"
                                 class="w-20 h-20 object-cover rounded-lg shadow-sm">
                        @endif
                        <div>
                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $item->product->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">Quantity: {{ $item->quantity }}</p>
                            <p class="text-gray-800 dark:text-gray-200 font-semibold">Ksh {{ number_format($item->product->price, 2) }}</p>
                        </div>
                    </div>
                    <p class="text-gray-800 dark:text-gray-200 font-bold text-lg">
                        Ksh {{ number_format($item->product->price * $item->quantity, 2) }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Total -->
        <div class="text-right mb-6">
            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">Total: Ksh {{ number_format($total, 2) }}</h3>
        </div>

        <!-- Checkout Form for M-Pesa -->
        <form action="{{ route('placeOrder') }}" method="POST" class="space-y-4 bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-inner">
            @csrf
            <p class="text-center text-green-600 dark:text-green-400 text-3xl font-extrabold font-serif mb-4">
                Pay with M-Pesa
            </p>

            <div>
                <label for="city" class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">City of Delivery</label>
                <select id="city" name="city" required
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    <option value="">Select City</option>
                    <option value="Nairobi" {{ old('city') == 'Nairobi' ? 'selected' : '' }}>Nairobi</option>
                    <option value="Mombasa" {{ old('city') == 'Mombasa' ? 'selected' : '' }}>Mombasa</option>
                    <option value="Kisumu" {{ old('city') == 'Kisumu' ? 'selected' : '' }}>Kisumu</option>
                    <option value="Nakuru" {{ old('city') == 'Nakuru' ? 'selected' : '' }}>Nakuru</option>
                    <option value="Eldoret" {{ old('city') == 'Eldoret' ? 'selected' : '' }}>Eldoret</option>
                </select>
            </div>

            <div>
                <label for="phone" class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="2547XXXXXXXX" required
                       class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <button type="submit"
                    class="w-full py-3 bg-green-600 dark:bg-green-500 text-white rounded-lg hover:bg-green-700 dark:hover:bg-green-400 font-semibold transition">
                Place Order
            </button>
        </form>
    @endif

</div>
@endsection
