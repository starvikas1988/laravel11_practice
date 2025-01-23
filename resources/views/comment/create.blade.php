<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Add a New Comment</h2>
    </x-slot>
<h1>Add a New Comment</h1>
<p><strong>Post Title:</strong> {{ $post->title }}</p>

<!-- Display the User Name -->
<p><strong>Commenting as:</strong> {{ $user->name }}</p>

@session('success')
    <div class="alert alert-success">{{ session('success') }}</div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all()  as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>
       
    </div>
@endif

<form action="{{ route('comment.store') }}" method="POST">
    @csrf
       <!-- Hidden Inputs for Post and User -->
       <input type="hidden" name="post_id" value="{{ $post->id }}">
       <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="mb-3">
        <label for="user_id" class="form-label">Select user</label>
        <select name="author" id="author" class="form-select">
            <option value="">Select user</option>
            @foreach ( $users as $userValue )
            <option value="{{ $userValue->name}}" {{ $user->id == $userValue->id ? 'selected' : '' }}>
                {{ $userValue->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Comment</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control" >{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-app-layout>