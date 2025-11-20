<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $user = Auth::user();

        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            return redirect()->back();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart');
    }
    public function incrementCart($id)
    {
       $item = Cart::findOrFail($id);
       $item->increment('quantity');
       return redirect()->back();
    }
    public function decrementCart($id)
    {
        $item = Cart::findOrFail($id);
        if($item->quantity>1){
            $item->decrement('quantity');
        }else{
            $item->delete();
        }

        return redirect()->back();
    }
    public function removeCartItem($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }

    // public function showCartQuantity() {
    //     $user = Auth::user();
    //     $cartItems = Cart::where('user_id', $user->id)->get();
    //     // $quantity = $cartItems->sum('quantity');

    //     return view('product', compact('quantity', 'cartItems'));
    // }
    public function showCart() {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $quantity = $cartItems->sum('quantity');

        return view('cart', compact('quantity', 'cartItems'));
    }

    public function checkout() {
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));
    }
}
