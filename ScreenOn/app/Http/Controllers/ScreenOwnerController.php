<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreenOwner;

class ScreenOwnerController extends Controller
{
    public function index()
    {
        $screenOwners = ScreenOwner::all();
        return view('screen_owner.index', compact('screenOwners'));
    }

    public function create()
    {
        return view('screen_owner.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        ScreenOwner::create($validatedData);

        return redirect()->route('screen_owner.index')->with('success', 'Screen owner created successfully.');
    }

    public function show(ScreenOwner $screenOwner)
    {
        return view('screen_owner.show', compact('screenOwner'));
    }

    public function edit(ScreenOwner $screenOwner)
    {
        return view('screen_owner.edit', compact('screenOwner'));
    }

    public function update(Request $request, ScreenOwner $screenOwner)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        $screenOwner->update($validatedData);

        return redirect()->route('screen_owner.index')->with('success', 'Screen owner updated successfully.');
    }

    public function destroy(ScreenOwner $screenOwner)
    {
        $screenOwner->delete();

        return redirect()->route('screen_owner.index')->with('success', 'Screen owner deleted successfully.');
    }
}
