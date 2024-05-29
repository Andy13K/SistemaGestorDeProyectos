@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
    </div>
@endsection
