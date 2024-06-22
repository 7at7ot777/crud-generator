@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Studio</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('studios.update', $studio->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $studio->name) }}">
            </div>
            <div class="mb-3">
                <label for="playlist_id" class="form-label">Playlist:</label>
                <select id="playlist_id" name="playlist_id" class="form-select">
                    @foreach($playlists as $playlist)
                        <option value="{{ $playlist->id }}" @if($playlist->id == $studio->playlist_id) selected @endif>{{ $playlist->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
