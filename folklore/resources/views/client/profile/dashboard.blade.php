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
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
