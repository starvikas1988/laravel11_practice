<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Users Management</h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    @if ($user->profile_image)
                                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-12 h-12 rounded-full mx-auto">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td> --}}
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function (e) {
                    e.preventDefault();
                    let form = this.closest(".delete-form");
    
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to undo this action!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
