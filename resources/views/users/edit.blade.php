<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Edit Users</h2>
    </x-slot>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
   
@endif

<form action="{{ route('users.update',$user) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $user->name }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email')?? $user->email }}" required>
    </div>

    <div class="mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" name="profile_image" id="profile_image" class="form-control">
        @if (!empty($user->profile_image))
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" style="max-width: 100px; margin-top: 10px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>
</x-app-layout>