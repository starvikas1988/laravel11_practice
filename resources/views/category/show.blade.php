<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">Category</h2>
    </x-slot>

@if (isset($category))
    <h2>{{ $category->name }}</h2>
    <p>{{ $category->description }}</p>
    @else
    <h2>No category found!!</h2>
    
@endif

</x-app-layout>