@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Studios</h1>
            <a href="{{ route('studios.create') }}" class="btn btn-primary">Create Studio</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Playlist</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($studios as $studio)
                <tr>
                    <td>{{ $studio->name }}</td>
                    <td>{{ $studio->playlist->name }}</td>
                    <td>
                        <a href="{{ route('studios.show', $studio->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('studios.edit', $studio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('studios.destroy', $studio->id) }}" method="POST" style="display:inline;">
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
@endsection
