<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('client')->paginate(10);
        return view('projects.index', compact('projects'));
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
        $clients = Client::all();
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $validated = $request->validated();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        $project = Project::create($validated);

        return redirect()->route('projects.index', ['lang' => app()->getLocale()])
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // Eager load the client relationship
        $project->load('client');
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($lang, Project $project)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('projects.edit', compact('project', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $lang, Project $project)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $validated = $request->validated();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        $project->update($validated);

        return redirect()->route('projects.index', ['lang' => $lang])
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Project $project)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $project->delete();
        return redirect()->route('projects.index', ['lang' => $lang])->with('success', 'Project deleted successfully.');
    }
}
