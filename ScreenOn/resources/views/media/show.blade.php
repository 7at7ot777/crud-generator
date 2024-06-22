@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Media Details</h1>
        <div class="mb-3">
            <label class="form-label">Media Type:</label>
            <p>{{ $media->media_type }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">File Location:</label>
            <p>{{ $media->file_location }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Screen Owner:</label>
            <p>{{ $media->screenOwner->company_name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Studio:</label>
            <p>{{ $media->studio->name }}</p>
        </div>
        <a href="{{ route('media.index') }}" class="btn btn-secondary">Back to Media</a>
    </div>
@endsection
