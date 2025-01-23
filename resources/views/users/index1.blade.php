<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
            
            <!-- Success & Error Messages -->
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-200 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 px-4 py-2 bg-red-200 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Add User Button -->
            <div class="mb-4 text-right">
                <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Add User</a>
            </div>

            <!-- Users Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    @if ($user->profile_image)
                                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-12 h-12 rounded-full mx-auto">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('users.edit', $user) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-700">Edit</a>
                                        
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">Delete</button>
                                        </form>

                                        <a href="{{ route('users.posts', $user) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700">View Posts</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
