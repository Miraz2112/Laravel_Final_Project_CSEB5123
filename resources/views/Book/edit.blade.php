@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Book</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.update', $book->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="author">Author</label>
                                <input id="author" type="text" class="form-control" name="author" value="{{ $book->author }}" required>
                            </div>

                            <div class="form-group">
                                <label for="publisher_name">Publisher</label>
                                <input id="publisher_name" type="text" class="form-control" name="publisher_name" value="{{ $book->publisher }}" required>
                            </div>

                            <div class="form-group">
                                <label for="published_year">Published Year</label>
                                <input id="published_year" type="text" class="form-control" name="published_year" value="{{ $book->published_year }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <input id="category" type="text" class="form-control" name="category" value="{{ $book->category }}" required>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
