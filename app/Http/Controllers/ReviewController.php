<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();     
        return view('reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $user_Id = random_int(1,10);
        $event_Id = random_int(1,10);
        Review::create([
            'user_Id' => $user_Id,
            'event_Id' => $event_Id,
            'review' => $request->review,
            'rating' => $request->rating
        ]);
        return back()->with('message', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->all());
        
        return redirect()->route('reviews.index')->with('success','Review Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
