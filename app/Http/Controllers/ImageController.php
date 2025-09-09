<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::latest()->paginate(10);
        // get latest 5 image with type gallery the type is type_en and type_ar

        $sliderImages = Image::latest()->where('type_en', 'gallery')->orWhere('type_ar', 'معرض')->take(5)->get();
        return view('images.index', compact('images', 'sliderImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        // services and blogs and tags
        $services = Service::all();
        $blogs = Blog::all();
        $tags = Tag::all();

        return view('images.create', compact('lang', 'services', 'blogs', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request, $lang)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        Image::create($request->validated());
        // Optionally handle file upload if needed
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image = Image::latest()->first();
            $image->update(['image' => $path]);
        }
        return redirect()->route('images.index', ['lang' => app()->getLocale()])->with('success', 'Image created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($lang, Image $image)
    {
        //
        return view('images.show', ['lang' => $lang], compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Image $image)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        // services and blogs and tags
        $services = Service::all();
        $blogs = Blog::all();
        $tags = Tag::all();

        return view('images.edit', compact('image', 'lang', 'services', 'blogs', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, $lang, Image $image)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $data = $request->validated();

        // Handle file upload before updating
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }

            // Store the new image and update the path in data array
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Now update with final data
        $image->update($data);

        return redirect()->route('images.index', ['lang' => $lang])
            ->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Image $image)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        //delete image file from storage
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return redirect()->route('images.index', ['lang' => $lang])->with('success', 'Image deleted successfully.');
    }
}
