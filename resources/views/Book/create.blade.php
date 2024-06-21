@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Book</div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="publisher_name">Publisher</label>
                            <input type="text" class="form-control" id="publisher_name" name="publisher_name" required>
                        </div>
                        <div class="form-group">
                            <label for="published_year">Published Year</label>
                            <input type="number" class="form-control" id="published_year" name="published_year" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
