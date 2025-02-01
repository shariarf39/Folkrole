<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

<div class="container mt-5">
    <h2>Course Management</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Course Button (Triggers Modal) -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
        <i class="fas fa-plus"></i> Add Course
    </button>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeCourse')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Short Description:</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Picture:</label>
                            <input type="file" name="picture" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Regular Price:</label>
                            <input type="number" name="regular_price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Offer Price:</label>
                            <input type="number" name="offer_price" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status:</label>
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
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Offer Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
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
                            <img src="uploads/images/courses/{{ $course->picture }}" width="50" height="50" alt="Course Image">
                        @else
                            No Image
                        @endif
                    </td>

                    <td>
                        @if ($course->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <!-- Delete Course -->
                        <form method="POST" action="{{ route('deleteCourse') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{$course->id }}">
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
