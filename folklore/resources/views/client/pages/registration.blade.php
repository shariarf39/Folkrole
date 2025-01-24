@extends('client.layouts.masterlayout')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        padding: 1rem;
    }

    .containerss {
        background: #fff;
        width: 100%;
        max-width: 400px;
        padding: 1rem 2.5rem;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    }

    .containerss h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        outline: none;
        border-radius: 4px;
        font-size: 16px;
        border: 1px solid gray;
    }

    .form-group input:focus {
        outline: none;
    }

    .form-group.password-group {
        position: relative;
    }

    .form-group.password-group .toggle-password {
        position: absolute;
        top: 70%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 16px;
        color: #007bff;
    }

    .form-group.password-group .toggle-password:hover {
        color: #0056b3;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .login_back {
        color: black;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
        padding: 1rem 2rem;
    }

    .login_back a {
        font-size: 16px;
        color: blue;
        text-decoration: none;
    }

    .login_back a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .containerss {
            padding: 15px;
        }

        .containerss h1 {
            font-size: 20px;
        }

        .form-group input {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
        }
    }
</style>

<div class="wrapper">
    <div class="containerss">
        <h1>Registration</h1>
        <form>
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="tel" id="number" name="number" placeholder="Enter your phone number" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye" id="togglePassword"></i></span>
            </div>

            <button type="submit" class="btn">Register</button>

            <p class="login_back">Already have an account? <a href="{{route('userLogin')}}">Sign In</a></p>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.querySelector(".toggle-password");
        const passwordInput = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            // Toggle icon between eye and eye-slash
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>







@endsection
