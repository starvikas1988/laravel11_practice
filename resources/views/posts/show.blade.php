@extends('layouts.app')

@section('content')
<h1>{{ $post->title }}</h1>
<p><strong>Author:</strong> {{ $post->user->name }}</p>
<p>{{ $post->content }}</p>

<h2>Comments</h2>
@session('success')
    <div class="alert alert-success">{{ session('success') }}</div>
@endsession
@if ($post->comments->isEmpty())
    <p>No comments yet.</p>
@else
    <ul>
        @foreach ($post->comments as $comment)
        <li><strong>{{ $comment->author }}:</strong> {{ $comment->content }}</li>
        @endforeach
    </ul>
@endif

<a href="{{ route('comment.create', ['post' => $post->id, 'user' => $post->user?->id]) }}">Add Comment</a>

&nbsp;
<a href="{{ route('users.posts', $post->user) }}">Back to Posts</a>
@endsection
