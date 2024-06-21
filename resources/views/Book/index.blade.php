@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Books
                        <a href="{{ route('books.create') }}" class="btn btn-success float-right">Add Book</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 20%">Title</th>
                                    <th style="width: 15%">Author</th>
                                    <th style="width: 15%">Publisher Name</th>
                                    <th style="width: 10%">Published Year</th>
                                    <th style="width: 15%">Category</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->publisher_name }}</td>
                                        <td>{{ $book->published_year }}</td>
                                        <td>{{ $book->category }}</td>
                                        <td>
                                                <span class="badge badge-{{ $book->isAvailable() ? 'success' : 'danger' }}">
                                                    {{ $book->isAvailable() ? 'Available' : 'Unavailable' }}
                                                </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Book Actions">
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No books found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
