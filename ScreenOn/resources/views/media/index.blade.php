@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Media</h1>
            <a href="{{ route('media.create') }}" class="btn btn-primary">Create Media</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Media Type</th>
                <th>Media Link</th>
                <th>Screen Owner</th>
                <th>Studio</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($media as $item)
                <tr>
                    <td>{{ $item->media_type }}</td>
                    <td>{{ $item->file_location }}</td>
                    <td>{{ $item->screenOwner->company_name }}</td>
                    <td>{{ $item->studio->name }}</td>
                    <td>
                        <a href="{{ route('media.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('media.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('media.destroy', $item->id) }}" method="POST" style="display:inline;">
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
