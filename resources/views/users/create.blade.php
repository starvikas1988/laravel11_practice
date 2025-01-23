<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Add User</h2>
    </x-slot>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter User name"  class="form-control"value="{{ old('name') }}">
    </div>

    <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" name = 'email' id="email" placeholder="Enter Email"  class="form-control"value="{{ old('email') }}">
    </div>

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" id="password" class="form-control">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" name="profile_image" id="profile_image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>



</form>

</x-app-layout>