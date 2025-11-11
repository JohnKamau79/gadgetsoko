<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('id', 'desc')->paginate(8);
        return view('gadgetsoko.product', compact('products'));
    }
    public function create() {
        return view('gadgetsoko.create');
    }

    public function store(Request $request )   {
        $request->validate([
            'title'=> 'required|string|max:255',
            'category'=>'nullable|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|numeric',
            'image'=>'nullable|image|max:6048',
        ]);
            $imagePath = null;
            if($request->hasFile('image')){
                $imagePath= $request->file('image')->store('products', 'public');
            }
            
            Product::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'category'=>$request->category,
                'price'=>$request->price,
                'image'=>$imagePath,
            ]);

            return redirect()->route('product')->with('success', 'Product created successfully!');
        
    }
}
