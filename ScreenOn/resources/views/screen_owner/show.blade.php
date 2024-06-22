@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Screen Owner Details</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">Company Name:</label>
                            <div class="col-md-6">
                                <p>{{ $screenOwner->company_name }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone:</label>
                            <div class="col-md-6">
                                <p>{{ $screenOwner->telephone }}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('screen_owner.edit', $screenOwner->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('screen_owner.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
