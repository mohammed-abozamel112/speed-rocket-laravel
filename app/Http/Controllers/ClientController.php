<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clients.index', compact('clients'));
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
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $client = Client::create($request->validated());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('clients', 'public');
            $client->image = $path;
            $client->save();
        }
        return redirect()->route('clients.index', ['lang' => app()->getLocale()])->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($lang,Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang,Client $client)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, UpdateClientRequest $request, Client $client)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        $client->update($request->validated());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('clients', 'public');
            $client->image = $path;
            $client->save();
        }

        return redirect()->route('clients.index', ['lang' => app()->getLocale()])->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang,Client $client)
    {
        // add auth check
        if (!Auth::check()) {
            return redirect()->route('login', ['lang' => app()->getLocale()])->with('error', 'You must be logged in to access this page.');
        }
        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }
        $client->delete();
        return redirect()->route('clients.index', ['lang' => app()->getLocale()])->with('success', 'Client deleted successfully.');
    }
}
