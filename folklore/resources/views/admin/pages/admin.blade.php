<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .badge {
            font-size: 0.9em;
            padding: 0.5em 0.75em;
        }
        .btn-action {
            margin-right: 5px;
        }
        .modal-content {
            border-radius: 8px;
        }
        .modal-header {
            background-color: #343a40;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }
        .modal-title {
            font-weight: bold;
        }
        .btn-close {
            filter: invert(1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mb-4 text-center">Admin Management</h3>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            location.reload(); // This will refresh the page after 3 seconds
        }, 1000); // 3000ms = 3 seconds
    </script>
@endif



        <!-- Add Admin Button -->
        <div class="d-flex justify-content-end mb-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                <i class="fas fa-plus"></i> Add Admin
            </button>

 

        </div>

        <!-- Admin Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <span class="badge {{ $admin->is_active == 1 ? 'bg-success' : 'bg-danger' }}">
                                {{ $admin->is_active == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('adminchangeStatus') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <input type="hidden" name="status" value="{{ $admin->is_active == 1 ? 0 : 1 }}">
                                <button type="submit" class="btn btn-warning btn-sm btn-action">
                                    <i class="fas {{ $admin->is_active == 1 ? 'fa-times' : 'fa-check' }}"></i>
                                    {{ $admin->is_active == 1 ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.delete') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('addAdmin') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Add Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Check if there's a success message in the session
        @if(session('success'))
            // Close the modal when success message is shown
            var myModal = new bootstrap.Modal(document.getElementById('addAdminModal'));
            myModal.hide();
        @endif
    </script>
</body>
</html>
