<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\ScreenOwner;
use App\Models\Studio;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::all();
        return view('media.index', compact('media'));
    }

    public function create()
    {
        $screenOwners = ScreenOwner::all();
        $studios = Studio::all();
        return view('media.create', compact('screenOwners', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media_type' => 'required|in:image,video',
            'file_location' => 'required|file|mimes:jpeg,png,mp4|max:2048',
            'screen_owner_id' => 'required|exists:screen_owners,id',
            'studio_id' => 'required|exists:studios,id',
        ]);

        // Handle file upload
        if ($request->hasFile('file_location')) {
            $file = $request->file('file_location');
            $filePath = $file->store('media', 'public'); // Store the file in the storage/app/public/media directory
        } else {
            return redirect()->back()->withInput()->withErrors(['file_location' => 'File upload failed.']);
        }

        // Create Media instance
        $media = new Media([
            'media_type' => $request->input('media_type'),
            'file_location' => url('storage/' . $filePath),
            'screen_owner_id' => $request->input('screen_owner_id'),
            'studio_id' => $request->input('studio_id'),
        ]);

        // Save the Media instance
        $media->save();

        return redirect()->route('media.index')->with('success', 'Media created successfully.');
    }

    public function show($id)
    {
        $media =  Media::with('screenOwner')->find($id);
        return view('media.show', compact('media'));
    }

    public function edit(Media $media)
    {
        $screenOwners = ScreenOwner::all();
        $studios = Studio::all();
        return view('media.edit', compact('media', 'screenOwners', 'studios'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'media_type' => 'required|in:image,video',
            'file_location' => 'required|max:255',
            'screen_owner_id' => 'required|exists:screen_owners,id',
            'studio_id' => 'required|exists:studios,id',
        ]);

        $media->update($request->all());

        return redirect()->route('media.index')->with('success', 'Media updated successfully.');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('media.index')->with('success', 'Media deleted successfully.');
    }
}
