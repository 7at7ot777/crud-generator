@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Playlists</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('playlists.create') }}" class="btn btn-primary">Create Playlist</a>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playlists as $playlist)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $playlist->name }}</td>
                                    <td>
                                        <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" style="display: inline;">
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
                </div>
            </div>
        </div>
    </div>
@endsection
