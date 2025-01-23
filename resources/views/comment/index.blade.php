@extends('layouts.appdata')
@section('title', 'Comments')   
@section('content')
<h1>Comments</h1>
<table class="table table-bordered">
    <th>
        <tr>
            <th>Comment Id</th>
            <th>Comment Content</th>
            <th>Post Title</th>
            <th>Post ID</th>
        </tr>
    </th>
    <tbody>
        @foreach ($commentdata as $comment )
       <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->content }}</td>
        <td>{{ $comment->post->title?? 'No Post Found'  }}</td>
        <td>{{ $comment->post->id?? 'N/A' }}</td>
       </tr>
        @endforeach
    </tbody>
</table>

{{ $commentdata->links() }}



@endsection