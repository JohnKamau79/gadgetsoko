<?php

namespace App\Http\Controllers;

use App\Models\WebsiteReview;
use Illuminate\Http\Request;

class WebsiteReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = WebsiteReview::with('user')->latest()->get();
        $latestReviews = WebsiteReview::with('user')->inRandomOrder()->take(4)->get();
        $avgRating = WebsiteReview::avg('rating');
        $totalReviews = WebsiteReview::count();

        return view('testimonial', compact('reviews','avgRating', 'totalReviews', 'latestReviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'review'=>'nullable|string|max:1000',
        ]);

        WebsiteReview::create([
            'user_id' =>auth()->id(),
            'rating' =>$request->rating,
            'review' =>$request->review,
        ]);

        return back()->with('success', 'Thanks for reviewing our website!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
