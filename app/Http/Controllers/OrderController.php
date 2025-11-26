<?php

namespace App\Http\Controllers;

use App\Services\MpesaService;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));

    }

    public function placeOrder(Request $request, MpesaService $mpesa)
{
    $request->validate([
        'city' => 'required|string',
        'phone' => 'required|string',
    ]);

    $user = Auth::user();
    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    // Create Order
    $order = Order::create([
        'user_id' => $user->id,
        'name' => $user->firstName,
        'city' => $request->city,
        'phone' => $request->phone,
        'total' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
        'status' => 'pending',
    ]);

    // Create Order Items
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
            'total' => $item->product->price * $item->quantity,
        ]);
    }

    // STK Push
    try {
        $mpesaResponse = $mpesa->stkPush($request->phone, $order->total, 'Order_'.$order->id);

    // Save CheckoutRequestID
    if (isset($mpesaResponse['CheckoutRequestID'])) {
        $order->checkout_request_id = $mpesaResponse['CheckoutRequestID'];
        $order->save();
    }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Mpesa initialisation failed. Please check your internet connection!');
    }

    // Clear Cart
    Cart::where('user_id', $user->id)->delete();

    return redirect()->route('checkout')
        ->with('success', 'STK Push initiated! Check your phone.')
        ->with('mpesa', $mpesaResponse);
}


    public function mpesaCallback(Request $request)
    {
        $data = $request->all();

        // Correct key name
        $callback = $data['Body']['stkCallback'];

        $checkoutRequestID = $callback['CheckoutRequestID'] ?? null;
        $resultCode = $callback['ResultCode'] ?? 1;

        // Find correct order
        $order = Order::where('checkout_request_id', $checkoutRequestID)->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($resultCode == 0) {
            // SUCCESS
            $order->status = 'paid';

            // Extract receipt
            foreach ($callback['CallbackMetadata']['Item'] as $item) {
                if ($item['Name'] == 'MpesaReceiptNumber') {
                    $order->mpesa_receipt_number = $item['Value'];
                }
            }
        } else {
            // FAILED
            $order->status = 'failed';
        }

        $order->save();

        return response()->json(['message' => 'Callback processed']);
    }


}
