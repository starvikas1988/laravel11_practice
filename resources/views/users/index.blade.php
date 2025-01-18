@extends('layouts.app')

@section('content')
<h1>Users</h1>

@session('success')
    <div class="alert alert-success">{{ session('success') }}</div>
@endsession

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif



<a href="{{ route('users.create') }}">Add User</a>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
           
            @if ($user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" style="max-width: 50px;">
            @else
                No Image
            @endif
        </td>

       
        <td>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            <a href="{{ route('users.posts', $user) }}">View Posts</a>
        </td>
    </tr>
    @endforeach
</table>
<!-- Pagination Links -->
<div class="d-flex justify-content-center m-4">
    {{ $users->links() }}
</div>
@endsection
