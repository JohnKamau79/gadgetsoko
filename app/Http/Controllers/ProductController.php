<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\WebsiteReview;
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
    public function homeIndex()
    {
        $products = Product::orderBy('id', 'desc')->paginate(4);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->take(3)->orderBy('id', 'desc')->get();
        $allCartItems = Cart::where('user_id', $user->id)->get();
        $quantity = $cartItems->sum('quantity');


        $reviews = WebsiteReview::with('user')->latest()->get();
        $latestReviews = WebsiteReview::with('user')->inRandomOrder()->take(4)->get();

        return view('home', compact('products', 'cartItems', 'quantity', 'reviews', 'latestReviews'));
    }

    public function show($id)
    {
        // $product = Product::findOrFail($id);
        $product = Product::with('reviews.user')->findOrFail($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $cartProductsIds = Cart::where('user_id', Auth::user()->id)
            ->pluck('product_id')
            ->toArray();

        return view('productdetails', compact('product', 'relatedProducts', 'cartProductsIds'));

    }
    // public function showHome($id)
    // {
    //     // $product = Product::findOrFail($id);
    //     $product = Product::with('reviews.user')->findOrFail($id);

    //     $relatedProducts = Product::where('category', $product->category)
    //         ->where('id', '!=', $product->id)
    //         ->take(4)
    //         ->get();

    //     $cartProductsIds = Cart::where('user_id', Auth::user()->id)
    //         ->pluck('product_id')
    //         ->toArray();

    //     return view('home', compact('product', 'relatedProducts', 'cartProductsIds'));

    // }
    public function create()
    {
        return view('create');
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('retailer.product-edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        if ($product->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required',
            'category' => 'nullable',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image'
        ]);

        $product->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }

            $path = $request->file('image')->store('products', 'public');

            $product->image = $path;
            $product->save();
        }

        return redirect()->route('dashboard', ['page' => 'products'])
            ->with('success', 'Product updated successfully');
    }

    public function delete(Product $product)
    {
        if ($product->user_id !== auth()->id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
            unlink(storage_path('app/public/' . $product->image));
        }

        $product->delete();

        return redirect('dashboard?page=products')->with('success', 'Product has been deleted successfully');
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
            'user_id' => Auth::user()->id,
            'image' => $imagePath,
        ]);

        return redirect()->route('product')->with('success', 'Product created successfully!');

    }

    public function showByCategory()
    {
        $products = Product::where('category', 'smartphone')->get();
        return view('product', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('title', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->paginate(8);

        $user = Auth::user();
        $cartProductsIds = $user
            ? Cart::where('user_id', $user->id)->pluck('product_id')->toArray()
            : [];

        $quantity = $user
            ? Cart::where('user_id', $user->id)->sum('quantity')
            : 0;

        $cartItems = $user
            ? Cart::where('user_id', $user->id)->take(3)->get()
            : collect();

        return view('product', compact('products', 'cartProductsIds', 'cartItems', 'quantity'));
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');

        $query = Product::query();

        if ($request->filled('category')) {
            if ($category && $category != '') {
                $query->where('category', $category);
            }
        }

        $price = $request->input('price');

        if ($request->filled('price')) {
            if ($price && $price != '') {
                switch ($request->price) {
                    case 'under100':
                        $query->where('price', '<', 100);
                        break;
                    case '100-500':
                        $query->where('price', [100, 500]);
                        break;
                    case '500-1000':
                        $query->where('price', [500, 1000]);
                        break;
                    case 'over1000':
                        $query->where('price', '>', 1000);
                        break;
                }
            }
        }

        $products = $query->orderBy('id', 'desc')->paginate(8);

        $user = Auth::user();
        $cartProductsIds = $user
            ? Cart::where('user_id', $user->id)->pluck('product_id')->toArray()
            : [];

        $quantity = $user
            ? Cart::where('user_id', $user->id)->sum('quantity')
            : 0;

        $cartItems = $user
            ? Cart::where('user_id', $user->id)->take(3)->get()
            : collect();

        return view('product', compact('products', 'cartProductsIds', 'cartItems', 'quantity'));
    }

}

