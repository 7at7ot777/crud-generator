@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Media</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('media.update', $media->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="media_type" class="form-label">Media Type:</label>
                <select id="media_type" name="media_type" class="form-select">
                    <option value="image" {{ $media->media_type == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $media->media_type == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="file_location" class="form-label">File Location:</label>
                <input type="text" id="file_location" name="file_location" class="form-control" value="{{ old('file_location', $media->file_location) }}">
            </div>
            <div class="mb-3">
                <label for="screen_owner_id" class="form-label">Screen Owner:</label>
                <select id="screen_owner_id" name="screen_owner_id" class="form-select">
                    @foreach($screenOwners as $owner)
                        <option value="{{ $owner->id }}" {{ $media->screen_owner_id == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="studio_id" class="form-label">Studio:</label>
                <select id="studio_id" name="studio_id" class="form-select">
                    @foreach($studios as $studio)
                        <option value="{{ $studio->id }}" {{ $media->studio_id == $studio->id ? 'selected' : '' }}>{{ $studio->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
