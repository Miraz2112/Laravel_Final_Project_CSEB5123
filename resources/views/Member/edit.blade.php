@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Member</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('members.update', $member->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="ic_no">IC No.</label>
                                <input id="ic_no" type="text" class="form-control" name="ic_no" value="{{ $member->ic_no }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ $member->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_info">Contact Information</label>
                                <input id="contact_info" type="text" class="form-control" name="contact_information" value="{{ $member->contact_information }}" required>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
