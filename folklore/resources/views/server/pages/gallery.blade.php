@extends('server.layouts.masterlayout')
@section('content')
@include('server.components.navbar')

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Gallery Management</h3>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Upload Button -->
             <br>
            <div class="d-flex justify-content-end mb-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <i class="fas fa-upload me-2"></i> Upload Image
                </button>
            </div>

            <!-- Upload Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('storeGallery') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input">
                                    <label for="is_active" class="form-check-label">Active</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-upload me-2"></i> Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Uploaded Images Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>                         
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td>{{ $image->title }}</td>
                                <td>
                                    <img src="{{ asset('uploads/images/gallery/'.$image->image) }}" alt="{{ $image->title }}" class="img-thumbnail" style="max-width: 100px;">
                                </td>
                                <td>
                                    @if($image->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                <form method="POST" action="{{ route('gallerychangeStatus') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $image->id }}">
                            <input type="hidden" name="status" value="{{ $image->is_active ? 0 : 1 }}">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas {{ $image->is_active ? 'fa-times' : 'fa-check' }}"></i>
                                {{ $image->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                                </td>
                                <td>
                                    <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection