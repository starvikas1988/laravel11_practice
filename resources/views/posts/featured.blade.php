<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Featured Posts</h2>
    </x-slot>

<a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">Back to All Posts</a>

@if ($posts->isEmpty())
    <p>No featured posts available.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->comments->count() }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
</x-app-layout>
