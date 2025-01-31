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
        .container{
            padding: 2rem 0;
        }

        .container h1{
            font-size: 1.7rem;
            font-weight: 700;
            text-align: center;
        }

        .profile-container {
            width: 70%;
            margin: 15px auto;
            padding: 1.5rem 2rem;
            border-radius: 10px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
            flex-direction: column;
            justify-content:center;
            align-items: center;
            width: 80%;
            height: auto;
        }

        .profile_details{
            padding: 6rem 2rem 2rem 2rem;
            width: 100%;
            box-shadow: 0 0 10px blue;
            border: 1px solid blue;
            border-radius: 7px;
            margin-top: -10%;
        }

        .profile-info .indentity {
            width: 100%;
            padding-top: .5rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            background-color: white;
        }

        .profile-info .img_profile{
            width: 100%;
            height: auto;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .profile-info .img_profile img{
            width: 20%;
            border-radius: 50%;
            border: 2px solid blue;
            background-color: white;
        }

         @media (max-width: 600px) {
            .profile-info{
                width: 100%;
            }
            .profile-container {
            width: 100%;
            padding: 0;
            }
            .profile-info .indentity {
                width: 100%;
            }

         }

        @media (max-width: 768px) {
            .profile-container {
            width: 100%;
        }
            .profile-info .indentity {
                width: 100%;
            }
        }

        .profile-container .btn,
        .btn-primary {
            background-color: blue;
            color: white;
            border: none;
            padding: .7rem 2rem;
            border-radius: 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin: 0 auto;
            cursor: pointer;
            transition: background-color 0.5s ease;
        }

        .profile-container .btn:hover,
        .btn-primary:hover {
            background-color: black;
        }

        .btn-primary {
            background-color: blue;
            color: white;
            border: none;
            padding: .5rem 1rem;
            border-radius: 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin: 0 auto;
            cursor: pointer;
            transition: background-color 0.5s ease;
        }


        .btn-primary:hover {
            background-color: black;
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
            <div class="img_profile">
                <img src="img/user.png" alt="Picture">
            </div>
            <div class="profile_details">
                <div class="indentity">
                <p><strong><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Name:</strong> {{ $user->name }}</p>
            </div>
            <div class="indentity">
                <p><strong><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
            </div>
            <div class="indentity">
                <p><strong><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email:</strong> {{ $user->email }}</p>
            </div>
            <div class="indentity">
                <p><strong><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
            </div>

        <div class="text-center">
            <!-- Trigger Edit Profile Modal -->
            <button class="btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
        </div>

            </div>

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
