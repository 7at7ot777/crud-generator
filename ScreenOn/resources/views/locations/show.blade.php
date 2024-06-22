@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Location Details</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <p>{{ $location->name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <p>{{ $location->address }}</p>
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <p>{{ $location->longitude }}</p>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <p>{{ $location->latitude }}</p>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <br>
                            <img src="{{ $location->image }}" alt="Location Image" style="max-width: 300px; max-height: 200px;">
                        </div>

                        <div class="form-group">
                            <label for="screen_owner_id">Screen Owner</label>
                            <p>{{ $location->screenOwner->company_name }}</p>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('locations.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

