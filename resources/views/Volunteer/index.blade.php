@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Volunteers
                        <a href="{{ route('volunteers.create') }}" class="btn btn-success float-right">Add Volunteer</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 20%">Name</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 20%">Actions</th> {{-- Updated this line --}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($volunteers as $volunteer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $volunteer->name }}</td>
                                        <td>{{ $volunteer->email }}</td>
                                        <td>{{ $volunteer->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('volunteers.edit', $volunteer->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="{{ route('volunteers.show', $volunteer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Show</a> {{-- Added this line --}}
                                                <form action="{{ route('volunteers.destroy', $volunteer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this volunteer?');" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No volunteers found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $volunteers->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
