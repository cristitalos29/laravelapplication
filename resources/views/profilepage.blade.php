@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $user->name }}'s Profile</h2>
        <p>Email: {{ $user->email }}</p>

        <!-- Change Password Form -->
        <form method="post" action="{{ route('profile.password.change') }}">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
@endsection
