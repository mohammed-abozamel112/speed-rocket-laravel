<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reviews = Review::paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, $lang)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $review = Review::create($request->validated());
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reviews', 'public');
            $review->image = $imagePath;
            $review->save();
        }
        // Redirect with success message
        return redirect()->route('reviews.index', ['lang' => app()->getLocale()])->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($lang, Review $review)
    {
        //
        return view('reviews.show', ['lang' => $lang], compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Review $review)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('reviews.edit', compact('review', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, $lang, Review $review)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $review->update($request->validated());
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reviews', 'public');
            $review->image = $imagePath;
            $review->save();
        }
        // Redirect with success message
        return redirect()->route('reviews.index', ['lang' => $lang])->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Review $review)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $review->delete();
        return redirect()->route('reviews.index', ['lang' => $lang])->with('success', 'Review deleted successfully.');
    }
}
