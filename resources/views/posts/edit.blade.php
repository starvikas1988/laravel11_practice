@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<h1>Edit Post</h1>

<!-- Show validation errors if any -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Select User -->
    <div class="mb-3">
        <label for="user_id" class="form-label">Author</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">Select Category</option>
            @foreach ($categories as $category )
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected':'' }}> {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <!-- Post Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
    </div>
    
    <!-- Post Content -->
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Update Post</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
