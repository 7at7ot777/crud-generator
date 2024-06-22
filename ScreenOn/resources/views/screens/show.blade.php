@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Screen Details</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="screen_name">Screen Name</label>
                            <p>{{ $screen->screen_name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="location_id">Location</label>
                            <p>{{ $screen->location->name }}</p>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('screens.edit', $screen->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('screens.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
