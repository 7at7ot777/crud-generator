@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Studio Details</h1>
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <p>{{ $studio->name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Playlist:</label>
            <p>{{ $studio->playlist->name }}</p>
        </div>
        <h2>Media</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Media Type</th>
                <th>File Location</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($studio->media as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ $media->media_type }}</td>
                    <td>
                        @if($media->media_type === 'image')
                            <img src="{{ $media->file_location }}" alt="Image" class="img-thumbnail" style="max-width: 150px;">
                        @else
                            <a href="{{ $media->file_location }}">{{ $media->file_location }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('media.show', $media->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('media.edit', $media->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('media.destroy', $media->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('studios.index') }}" class="btn btn-secondary">Back to Studios</a>
    </div>
@endsection
