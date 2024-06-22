@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Screens</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('screens.create') }}" class="btn btn-primary">Create Screen</a>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Screen Name</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($screens as $screen)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $screen->screen_name }}</td>
                                    <td>{{ $screen->location->name }}</td>
                                    <td>
                                        <a href="{{ route('screens.show', $screen->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('screens.edit', $screen->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('screens.destroy', $screen->id) }}" method="POST" style="display: inline;">
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
