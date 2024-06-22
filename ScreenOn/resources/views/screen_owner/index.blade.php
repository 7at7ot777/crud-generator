@extends('layouts.app')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="m-0 mt-1 font-weight-bold text-primary">Screen Owners</h6>
                </div>
                <div class="col text-right">
                    <a href="{{ route('screen_owner.create') }}" class="btn btn-success">Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Telephone</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th> <!-- New column for buttons -->
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Telephone</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th> <!-- New column for buttons -->
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($screenOwners as $screenOwner)
                        <tr>
                            <td>{{ $screenOwner->id }}</td>
                            <td>{{ $screenOwner->company_name }}</td>
                            <td>{{ $screenOwner->telephone }}</td>
                            <td>{{ $screenOwner->created_at }}</td>
                            <td>{{ $screenOwner->updated_at }}</td>
                            <td>
                                <!-- Show button -->
                                <a href="{{ route('screen_owner.show', $screenOwner->id) }}" class="btn btn-success">Show</a>

                                <!-- Edit button -->
                                <a href="{{ route('screen_owner.edit', $screenOwner->id) }}" class="btn btn-primary">Edit</a>

                                <!-- Delete button -->
                                <form action="{{ route('screen_owner.destroy', $screenOwner->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection

