@extends('server.layouts.masterlayout')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4 text-center">Admin Management</h3>

    <!-- Error Handling -->
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
    @endif

    <!-- Add Admin Button -->
    <div class="d-flex justify-content-end mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
            <i class="fas fa-plus"></i> Add Admin
        </button>
    </div>

    <!-- Admin Table -->
    <table class="table table-hover">
        <thead class="table-dark">
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
                        <span class="badge {{ $admin->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $admin->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('adminchangeStatus') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            <input type="hidden" name="status" value="{{ $admin->is_active ? 0 : 1 }}">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas {{ $admin->is_active ? 'fa-times' : 'fa-check' }}"></i>
                                {{ $admin->is_active ? 'Deactivate' : 'Activate' }}
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
            <div class="modal-header bg-dark text-white">
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
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
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

<!-- Bootstrap JS & Password Toggle Script -->
<script>
    function togglePassword(fieldId) {
        var field = document.getElementById(fieldId);
        var icon = field.nextElementSibling.querySelector("i");
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endsection