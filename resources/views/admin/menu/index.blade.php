@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Admin Menu Management</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form to Add New Menu Item --}}
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required>
            </div>

            {{-- Category Select for New Item --}}
            <div class="col-md-2">
                <select name="category_id" class="form-select" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>


{{-- Select Multuble images --}}
<div class="mb-3">
    <label for="main_image">Main Image</label>
    <input type="file" name="main_image" class="form-control">
</div>
<div class="mb-3">
    <label for="gallery_images">Upload Gallery Images</label>
    <input type="file" name="gallery_images[]" class="form-control" multiple>
</div>



<button type="submit" class="btn btn-primary my-3">Add Item</button>
    </form>

    {{-- Menu Items Table --}}
<table class="table table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th style="width: 150px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($menuItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>{{ $item->category->name ?? 'N/A' }}</td>
                <td>
                    <!-- Delete Button -->
                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <!-- Edit Button -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        Edit
                    </button>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg"> 
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="editModalLabel{{ $item->id }}">Edit Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('menu.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" step="0.01" value="{{ $item->price }}" class="form-control" required>
                                </div>

                                {{-- Category Select for New Item --}}
            <div class="mb-3">
                <select name="category_id" class="form-select" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>


{{-- Select Multuble images --}}
<div class="mb-3">
    <label for="main_image">Main Image</label>
    <input type="file" name="main_image" class="form-control">
</div>
<div class="mb-3">
    <label for="gallery_images">Upload Gallery Images</label>
    <input type="file" name="gallery_images[]" class="form-control" multiple>
</div>


                                <!-- Submit -->
                                <button type="submit" class="btn btn-success w-100">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">No menu items found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
