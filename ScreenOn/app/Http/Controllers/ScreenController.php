<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Screen;

class ScreenController extends Controller
{
    public function index()
    {
        $screens = Screen::all();
        return view('screens.index', compact('screens'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('screens.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'screen_name' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
        ]);

        Screen::create($validatedData);

        return redirect()->route('screens.index')->with('success', 'Screen created successfully.');
    }

    public function show(Screen $screen)
    {
        return view('screens.show', compact('screen'));
    }

    public function edit(Screen $screen)
    {
        $locations = Location::all();
        return view('screens.edit', compact('screen','locations'));
    }

    public function update(Request $request, Screen $screen)
    {
        $validatedData = $request->validate([
            'screen_name' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
        ]);

        $screen->update($validatedData);

        return redirect()->route('screens.index')->with('success', 'Screen updated successfully.');
    }

    public function destroy(Screen $screen)
    {
        $screen->delete();

        return redirect()->route('screens.index')->with('success', 'Screen deleted successfully.');
    }
}
