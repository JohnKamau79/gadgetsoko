<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(8);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->take(3)->orderBy('id', 'desc')->get();
        $allCartItems = Cart::where('user_id', $user->id)->get();
        $quantity = $cartItems->sum('quantity');

        return view('product', compact('products', 'cartItems', 'quantity'));
    }

    public function show($id)
    {
        // $product = Product::findOrFail($id);
        $product = Product::with('reviews.user')->findOrFail($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('productdetails', compact('product', 'relatedProducts'));

    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:6048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('product')->with('success', 'Product created successfully!');

    }

    public function showByCategory()
    {
        $products = Product::where('category', 'smartphone')->get();
        return view('product', compact('products'));
    }
}
