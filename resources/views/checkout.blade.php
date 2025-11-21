@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-4xl mx-auto my-12 bg-white p-6 rounded-lg shadow">

        <h2 class="text-2xl font-semibold mb-6">Checkout</h2>

        @if ($cartItems->isEmpty())
            <p class="text-gray-600">Your cart is empty.</p>
        @else
            <!-- Cart Items -->
            <div class="space-y-4 mb-6">
                @foreach ($cartItems as $item)
                    <div class="flex items-center justify-between border-b pb-4">
                        <div class="flex items-center gap-4">
                            @if ($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->title }}"
                                    class="w-20 h-20 object-cover rounded">
                            @endif
                            <div>
                                <h3 class="text-lg font-medium">{{ $item->product->title }}</h3>
                                <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                                <p class="text-gray-800 font-semibold">$ {{ number_format($item->product->price) }}</p>
                            </div>
                        </div>
                        <p class="text-gray-800 font-bold">$ {{ number_format($item->product->price * $item->quantity) }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Total -->
            <div class="text-right mb-6">
                <h3 class="text-xl font-semibold">Total: $ {{ number_format($total, 2) }}</h3>
            </div>

            <!-- Checkout Form for M-Pesa -->
            <form action="{{ route('placeOrder') }}" method="POST" class="space-y-4">
                @csrf
                <p class=" text-center text-green-600 text-3xl font-extrabold font-serif">
                    Pay with M-Pesa
                </p>
                <div>
                    <label class="font-semibold" for="city">City of Delivery</label>
                    <select id="city" name="city" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select City</option>
                        <option value="Nairobi" {{ old('city') == 'Nairobi' ? 'selected' : '' }}>Nairobi</option>
                        <option value="Mombasa" {{ old('city') == 'Mombasa' ? 'selected' : '' }}>Mombasa</option>
                        <option value="Kisumu" {{ old('city') == 'Kisumu' ? 'selected' : '' }}>Kisumu</option>
                        <option value="Nakuru" {{ old('city') == 'Nakuru' ? 'selected' : '' }}>Nakuru</option>
                        <option value="Eldoret" {{ old('city') == 'Eldoret' ? 'selected' : '' }}>Eldoret</option>
                        <!-- Add more cities as needed -->
                    </select>
                </div>


                <div>
                    <label class="font-semibold" for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="2547XXXXXXXX" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full py-3 bg-green-600 text-white rounded hover:bg-green-700 font-semibold">
                    Place Order
                </button>
            </form>
        @endif

    </div>
@endsection
