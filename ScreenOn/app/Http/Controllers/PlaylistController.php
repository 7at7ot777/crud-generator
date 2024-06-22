<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Playlist::create($validatedData);

        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully.');
    }

    public function show(Playlist $playlist)
    {
         $playlist->load('studio');
        return view('playlists.show', compact('playlist'));
    }

    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', compact('playlist'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $playlist->update($validatedData);

        return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully.');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted successfully.');
    }
}
