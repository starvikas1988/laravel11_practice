<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Users Post</h2>
    </x-slot>
<h1>Posts by {{ $user->name }}</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>
            <a href="{{ route('posts.show', $post) }}">View Post</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('users.index') }}">Back to Users</a>
</x-app-layout>
