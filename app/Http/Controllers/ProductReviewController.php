<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request, $productId) {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'required|string',
        ]);

        ProductReview::create([
            'user_id'=>auth()->id(),
            'product_id'=>$productId,
            'rating'=>$request->rating,
            'comment'=>$request->comment,
        ]);

        return back()->with('success', 'Product review added!');
    }

    public function delete(ProductReview $productReview ) {
        if($productReview->user_id !== auth()->id() && Auth::user()->role !== 'admin'){
            abort(403, 'Unauthorised action.');
        }

        $productReview->delete();

        return redirect()->back()->with('success', 'Review deleted successfully');
    }
}
