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
<h1>User Dashboard</h1>
    <div class="profile-container">
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

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
