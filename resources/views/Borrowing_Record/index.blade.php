@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Borrowing Records
                        <a href="{{ route('borrowing_records.create') }}" class="btn btn-success float-right">Add Borrowing Record</a>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('borrowing_records.index') }}" class="form-inline mb-3">
                            <div class="form-group mr-2">
                                <label for="search_by" class="mr-2">Search By</label>
                                <select class="form-control" id="search_by" name="search_by">
                                    <option value="ic">IC No.</option>
                                    <option value="book">Book ID</option>
                                </select>
                            </div>
                            <div class="form-group mr-2">
                                <label for="search" class="mr-2">Search</label>
                                <input type="text" class="form-control" id="search" name="search">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Book Title</th>
                                    <th>Member Name</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($records as $record)
                                    <tr>
                                        <td>{{ $record->book->title }}</td>
                                        <td>{{ $record->member->name }}</td>
                                        <td>{{ $record->borrow_date }}</td>
                                        <td>{{ $record->return_date ?? 'Not returned yet' }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Record Actions">
                                                <a href="{{ route('borrowing_records.show', $record->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Show</a>
                                                <a href="{{ route('borrowing_records.edit', $record->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('borrowing_records.destroy', $record->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this borrowing record?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No borrowing records found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $records->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
