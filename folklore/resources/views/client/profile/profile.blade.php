
@extends('client.layouts.masterlayout')

@section('content')

<style>
    .profile-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .profile-container h1 {
        margin-bottom: 20px;
    }
    .profile-container p {
        margin: 10px 0;
        font-size: 16px;
    }
</style>

<div class="profile-container">
    <h1>Profile Page</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
    <p><strong>Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
</div>

@endsection
