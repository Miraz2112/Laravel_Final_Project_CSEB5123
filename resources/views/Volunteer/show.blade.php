@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Volunteer Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $volunteer->name }}</p>
                        <p><strong>Email:</strong> {{ $volunteer->email }}</p>
                        <p><strong>Status:</strong> {{ $volunteer->is_active ? 'Active' : 'Inactive' }}</p>
                        <a href="{{ route('volunteers.index') }}" class="btn btn-primary">Back To Index</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
