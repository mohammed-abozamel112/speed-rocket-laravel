<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $tags = Tag::latest()->paginate(10);
        $tagsImages = Image::whereNotNull('tag_id')->take(5)->get();
        //get all tags in filter according to id
      
        return view('tags.index', compact('tags', 'lang', 'tagsImages'));
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
        return view('tags.create', ['lang' => $lang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $tag = Tag::create($request->validated());
        // Optionally handle file upload if needed
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tags', 'public');
            $tag->update(['image' => $path]);
        }
        return redirect()->route('tags.index', ['lang' => app()->getLocale()])->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($lang, Tag $tag)
    {
        // images with tag_id relation
        $imagesTag = Image::where('tag_id', $tag->id)->get();

        return view('tags.show', compact('tag', 'imagesTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Tag $tag)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, $lang, Tag $tag)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $tag->update($request->validated());
        return redirect()->route('tags.index', ['lang' => $lang])->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Tag $tag)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $tag->delete();
        return redirect()->route('tags.index', ['lang' => $lang])->with('success', 'Tag deleted successfully.');
    }
}
