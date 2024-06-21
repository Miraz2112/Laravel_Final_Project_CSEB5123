<!-- resources/views/volunteers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Volunteer</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('volunteers.update', $volunteer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $volunteer->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $volunteer->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password (leave blank if not changing)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" {{ $volunteer->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$volunteer->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Volunteer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

