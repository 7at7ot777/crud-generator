@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">Playlist Details</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <p>{{ $playlist->name }}</p>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('playlists.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <!-- Studios related to the playlist -->
                <div class="card">
                    <div class="card-header">Studios</div>
                    <div class="card-body">
                        @foreach($playlist->studio as $studio)
                            <div class="mb-3">
                                <h5>{{ $studio->name }}</h5>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Media Type</th>
                                        <th>File Location</th>
                                        <th>Screen Owner</th>
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
                                            <td>{{ $media->screenOwner ? $media->screenOwner->company_name : 'N/A' }}</td>
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
