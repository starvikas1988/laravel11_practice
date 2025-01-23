<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Edit category</h2>
    </x-slot>

<!-- Show validation errors if any -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('category.update',$category) }}"  method="POST">
    @csrf
    @method('PUT')
   <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" 
    value="{{ old('name', $category->name) }}"
   />
   </div>
   <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
        {{ old('description',$category->description) }}
    </textarea>
   </div>

   <button type='submit' class="btn btn-primary">Submit</button>
   <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</x-app-layout>