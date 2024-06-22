@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Screen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('screens.update', $screen->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="screen_name">Screen Name</label>
                                <input type="text" class="form-control @error('screen_name') is-invalid @enderror" id="screen_name" name="screen_name" value="{{ old('screen_name', $screen->screen_name) }}" required autofocus>
                                @error('screen_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location_id">Location</label>
                                <select class="form-control @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>
                                    <option value="">Select Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ old('location_id', $screen->location_id) == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
