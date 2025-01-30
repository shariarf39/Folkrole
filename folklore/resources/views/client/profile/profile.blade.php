<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .profile-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .profile-container h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #2c3e50;
            font-weight: 700;
        }

        .profile-container p {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: #34495e;
        }

        .profile-container p strong {
            color: #2980b9;
        }

        .profile-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .profile-info div {
            width: 48%;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .profile-info div {
                width: 100%;
            }
        }

        .profile-container .btn {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-container .btn:hover {
            background-color: #1f6f99;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <h1>User Profile</h1>
        @if(session('success_updateProfile'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_updateProfile') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <div class="profile-info">
            <div>
                <p><strong>Name:</strong> {{ $user->name }}</p>
            </div>
            <div>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
            <div>
                <p><strong>Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
            </div>
            <div>
                <p><strong>Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
            </div>
        </div>

        <div class="text-center">
            <!-- Trigger Edit Profile Modal -->
            <button class="btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
        </div>
    </div>
</div>

<!-- Modal for Edit Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateProfile') }}">
                    @csrf
                    @method('PUT')

                    <!-- Input Fields for Profile Edit -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address ?? '') }}">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
