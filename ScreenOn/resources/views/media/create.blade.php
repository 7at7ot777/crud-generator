@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Media</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="media_type" class="form-label">Media Type:</label>
                <select id="media_type" name="media_type" class="form-select @error('media_type') is-invalid @enderror">
                    <option value="" disabled selected>Select media type</option>
                    <option value="image" {{ old('media_type') == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('media_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="file_location" class="form-label">Upload Media:</label>
                <input type="file" id="file_location" name="file_location" class="form-control-file @error('file_location') is-invalid @enderror">
                @error('file_location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="screen_owner_id" class="form-label">Screen Owner:</label>
                <select id="screen_owner_id" name="screen_owner_id" class="form-select @error('screen_owner_id') is-invalid @enderror">
                    <option value="" disabled selected>Select screen owner</option>
                    @foreach($screenOwners as $owner)
                        <option value="{{ $owner->id }}" {{ old('screen_owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->company_name }}</option>
                    @endforeach
                </select>
                @error('screen_owner_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="studio_id" class="form-label">Studio:</label>
                <select id="studio_id" name="studio_id" class="form-select @error('studio_id') is-invalid @enderror">
                    <option value="" disabled selected>Select studio</option>
                    @foreach($studios as $studio)
                        <option value="{{ $studio->id }}" {{ old('studio_id') == $studio->id ? 'selected' : '' }}>{{ $studio->name }}</option>
                    @endforeach
                </select>
                @error('studio_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
