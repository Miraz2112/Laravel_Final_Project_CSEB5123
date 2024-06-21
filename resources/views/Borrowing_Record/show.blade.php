@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Borrowing Record Details</div>
                    <div class="card-body">
                        <p><strong>Book:</strong> {{ $record->book->title }}</p>
                        <p><strong>Borrower:</strong> {{ $record->member->name }}</p>
                        <p><strong>Borrowing Date:</strong> {{ $record->borrowing_date }}</p>
                        <p><strong>Returning Date:</strong> {{ $record->returning_date ?? 'Not returned yet' }}</p>
                        <a href="{{ route('borrowing_records.index') }}" class="btn btn-primary mt-3">Back to Index</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
