<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\ScreenOwner;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
          $locations->load('screenOwner');
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        $screenOwners = ScreenOwner::all();
        return view('locations.create', compact('screenOwners'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screen_owner_id' => 'required|exists:screen_owners,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('location', 'public');
            $validatedData['image'] = url('storage/' . $imagePath);
        }

        Location::create($validatedData);

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        $screenOwners = ScreenOwner::all();
        return view('locations.edit', compact('location', 'screenOwners'));
    }

    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screen_owner_id' => 'required|exists:screen_owners,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('location', 'public');
            $validatedData['image'] = url('storage/' . $imagePath);
        }

        $location->update($validatedData);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
