<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioControlle extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return view('studios.index', compact('studios'));
    }

    public function create()
    {
        $playlists = Playlist::all();
        return view('studios.create',compact('playlists'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        Studio::create($validatedData);

        return redirect()->route('studios.index')->with('success', 'Studio created successfully.');
    }

    public function show(Studio $studio)
    {
        $studio->load('media');
        return view('studios.show', compact('studio'));
    }

    public function edit(Studio $studio)
    {
        $playlists = Playlist::all();
        return view('studios.edit', compact('studio','playlists'));
    }

    public function update(Request $request, Studio $studio)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'playlist_id' => 'required|exists:playlists,id',
        ]);

        $studio->update($validatedData);

        return redirect()->route('studios.index')->with('success', 'Studio updated successfully.');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();

        return redirect()->route('studios.index')->with('success', 'Studio deleted successfully.');
    }
}
