@extends('layouts.app')

@section('content')
<h1>Posts by {{ $user->name }}</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>
            <a href="{{ route('posts.show', $post) }}">View Post</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('users.index') }}">Back to Users</a>
@endsection
