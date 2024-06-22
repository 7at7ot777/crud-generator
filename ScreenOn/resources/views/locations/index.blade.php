@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Locations</div>

                    <div class="card-body">
                        <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Create Location</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Screen Owner</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{ $location->id }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->address }}</td>
                                    <td>{{ $location->longitude }}</td>
                                    <td>{{ $location->latitude }}</td>
                                    <td>{{ $location->screenOwner->company_name }}
                                    </td>
                                    <td>
                                        <!-- Show button -->
                                        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-info btn-sm">Show</a>

                                        <!-- Edit button -->
                                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <!-- Delete button -->
                                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline;">
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
