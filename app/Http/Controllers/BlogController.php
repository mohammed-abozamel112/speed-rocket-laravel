<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::with('tags')->latest()->paginate(10);
        if (Auth::check()) {
            $blogs = Blog::with('user', 'tags')->latest()->paginate(10);
        }
        return view('blogs.index', compact('blogs'));
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
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        // Validate and store the blog data
        $validated = $request->validated();

        // Set user_id if not provided
        if (!isset($validated['user_id']) && Auth::check()) {
            $validated['user_id'] = Auth::id();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // store image and add path to validated data so it will be saved on create
            $validated['image'] = $request->file('image')->store('images/blogs', 'public');
        }

        $blog = Blog::create($validated);

        return redirect()->route('blogs.index', ['lang' => app()->getLocale()])->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($lang, Blog $blog)
    {

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Blog $blog)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('images/blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('blogs.index', ['lang' => app()->getLocale()])->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Blog $blog)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('blogs.index', ['lang' => app()->getLocale()])->with('success', 'Blog deleted successfully.');
    }
}
