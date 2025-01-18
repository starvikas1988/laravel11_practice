@extends('layouts/app')

@section('content')

<h1>Category</h1>

@if (isset($category))
    <h2>{{ $category->name }}</h2>
    <p>{{ $category->description }}</p>
    @else
    <h2>No category found!!</h2>
    
@endif

@endsection