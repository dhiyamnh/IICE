@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>

    <div class="list-group">
        <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">Manage Users</a>
        <a href="{{ route('admin.events') }}" class="list-group-item list-group-item-action">Manage Events</a>
        <a href="{{ route('admin.reports') }}" class="list-group-item list-group-item-action">View Reports</a>
    </div>
</div>
@endsection
