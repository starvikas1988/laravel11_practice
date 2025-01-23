<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Category</h2>
    </x-slot>

<a href="{{ route('category.create') }}" class="btn btn-success"> Create category</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-stripped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $key=>$category)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <a href="{{ route('category.show',$category) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('category.edit',$category) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('category.destroy',$category) }}" method="post" style="m-2;display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>

</x-app-layout>