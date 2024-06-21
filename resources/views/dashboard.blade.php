@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1>Welcome to the Rural Library</h1>
            <p class="lead">Explore books and information.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text">{{ $booksCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Members</h5>
                        <p class="card-text">{{ $membersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Borrowing Records</h5>
                        <p class="card-text">{{ $borrowingRecordsCount }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Latest Books</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Published Year</th>
                            <th>Category</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestBooks as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher_name }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>{{ $book->category }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
