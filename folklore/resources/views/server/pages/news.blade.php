@extends('server.layouts.masterlayout')

@section('content')
@include('server.components.navbar')
<div class="container mt-5">
    <div class="card shadow-lg">
        <!-- Card Header -->
        <div class="card-header bg-primary text-white text-center">
            <h3>News Management</h3>
        </div>

        <!-- Card Body -->
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
                    <i class="fas fa-upload me-2"></i> Upload News
                </button>
            </div>

            <!-- Upload Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="uploadModalLabel">Upload News</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('storeNews') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <input type="text" name="short_description" id="short_description" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="full_description" class="form-label">Full Description</label>
                                    <textarea name="full_description" id="full_description" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="news_date" class="form-label">News Date</label>
                                    <input type="date" name="news_date" id="news_date" class="form-control" required>
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

            <!-- Uploaded News Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Short Description</th>
                            <th>News Date</th>
                            <th>Status</th>
                            <th>Toggle Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset('uploads/images/news/'.$item->image) }}" alt="{{ $item->title }}" class="img-thumbnail" style="max-width: 100px;">
                                </td>
                                <td>{{ $item->short_description }}</td>
                                <td>{{ $item->news_date }}</td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('toggleStatusNews') }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="status" value="{{ $item->is_active ? 0 : 1 }}">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fas {{ $item->is_active ? 'fa-times' : 'fa-check' }}"></i>
                                            {{ $item->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewNewsModal{{ $item->id }}">
                                        <i class="fas fa-eye"></i> 
                                    </button>
                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this news?')">
                                            <i class="fas fa-trash-alt"></i> 
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- View News Modal -->
                            <div class="modal fade" id="viewNewsModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">{{ $item->title }}</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('uploads/images/news/'.$item->image) }}" class="img-fluid mb-3" alt="{{ $item->title }}">
                                            <p><strong>Short Description:</strong> {{ $item->short_description }}</p>
                                            <p><strong>Full Description:</strong> {{ $item->full_description }}</p>
                                            <p><strong>News Date:</strong> {{ $item->news_date }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection