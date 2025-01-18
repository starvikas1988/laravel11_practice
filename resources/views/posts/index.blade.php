@extends('layouts.app')

@section('content')
<h1>Posts</h1>
<a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>

<a href="{{ route('posts.featured') }}" class="btn btn-warning">View Featured Posts</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
{{-- @dump($posts) --}}
{{-- @dd($posts)
<pre>{{ print_r($posts, true) }}</pre> --}}

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Posted By</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Comments Count</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $key=>$post)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $post->user->name }}</td>
            <td>{{$post->title  }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->comments->count() }}</td>
            <td>
                <a href="{{ route('posts.show',$post) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('posts.edit',$post) }}" class="btn btn-primary btn-sm" style="m-2">Edit</a>
                <form action="{{ route('posts.destroy',$post) }}" method="post" style="m-2;display:inline; ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          </tr>
          <tr>
            <td colspan='5'>
                <strong>Comments:</strong>
                @if ($post->comments->isEmpty())
                    <p>No comments available for this post</p>
                    @else
                    <ul>
                        @foreach ($post->comments as $comment )
                            <li>
                                <strong>{{ $comment->author }}: {{ $comment->content }}</strong>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
<!-- Pagination Links -->
<div class="d-flex justify-content-center m-4">
    {{ $posts->links() }}
</div>

@endsection