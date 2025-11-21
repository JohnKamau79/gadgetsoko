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
    public function checkout() {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $total = $cartItems->sum( fn($item) => $item->product->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));

    }

    public function placeOrder(Request $request, MpesaService $mpesa ) {
        $request->validate([
            'city' => 'required|string',
            'phone' => 'required|string',
        ]);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        if($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');

        }

        $order = Order::create([
            'user_id'=>$user->id,
            'name'=>$user->name,
            'city'=>$request->city,
            'phone'=>$request->phone,
            'total'=>$cartItems->sum( fn($item) => $item->product->price * $item->quantity),
            'status'=>'pending',
        ]);

        foreach($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'total' => $item->product->price * $item->quantity,
            ]);
        }

        $mpesaResponse = $mpesa->stkPush($request->phone, $order->total, 'Order'.$order->id);

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('checkout')->with('success', 'STK Push initiated! Check your phone.')->with('mpesa', $mpesaResponse);
    }

    public function mpesaCallBack(Request $request) {
        $data = $request->all();

        $checkoutRequestID = $data['Body']['stkCallBack']['CheckoutRequestID'] ?? null;
        $resultCode  =$data['Body']['stkCallBack']['ResultCode'] ?? 1;;

        $orderItem = Order::where('reference', $checkoutRequestID)->first();

        if($orderItem) {
            $orderItem->status = ($resultCode == 0) ? 'paid'  : 'failed';
            $orderItem->save();

        return response()->json(['message' => 'Callback received']);
        }
    }

}
