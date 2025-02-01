@extends('server.layouts.masterlayout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Course Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
            <i class="fas fa-plus"></i> Add Course
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeCourse') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description:</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Picture:</label>
                            <input type="file" name="picture" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Regular Price:</label>
                            <input type="number" name="regular_price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Offer Price:</label>
                            <input type="number" name="offer_price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status:</label>
                            <select name="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Course List -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-4 text-center">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Offer Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->regular_price }}</td>
                        <td>{{ $course->offer_price ?? 'N/A' }}</td>
                        <td>
                            @if ($course->picture)
                                <img src="uploads/images/courses/{{ $course->picture }}" class="rounded" width="50" height="50" alt="Course Image">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $course->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                        
                        <form method="POST" action="{{ route('coursechangeStatus') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <input type="hidden" name="status" value="{{ $course->is_active ? 0 : 1 }}">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas {{ $course->is_active ? 'fa-times' : 'fa-check' }}"></i>
                                {{ $course->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                    <td>
                            <form method="POST" action="{{ route('deleteCourse') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection