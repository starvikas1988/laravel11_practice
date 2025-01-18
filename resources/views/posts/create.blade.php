@extends('layouts.app')

@section('content')
<h1>Create New Post</h1>

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
{{-- @dump($categories); --}}
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    
    <!-- Select User -->
    <div class="mb-3">
        <label for="user_id" class="form-label">Author</label>
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">Select Author</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cagerory_id" class="form-label">Category</label>
        <select name="cagerory_id" id="cagerory_id" class="form-select">
            <option value="">Select category</option>
            @foreach ( $categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <!-- Post Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title" required>
    </div>
    
    <!-- Post Content -->
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" rows="5" placeholder="Enter post content" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Create Post</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
