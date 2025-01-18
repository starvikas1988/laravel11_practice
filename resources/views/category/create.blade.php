@extends('layouts.app')

@section('content')
<h1>Create Category</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('category.store') }}" method="POST">
    @csrf
       <!-- Category Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category name">
    </div>
    
    <!-- Category Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Category description"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Create Category</button>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>

</form>
@endsection