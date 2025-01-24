@extends('client.layouts.masterlayout')

@section('content')


    <link rel="stylesheet" href="{{ asset('style/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="login_page">
        <div class="login">
            <img src="{{ asset('img/bifcd_lgo.png') }}" alt="Logo">
            <p>Sign in to <a href="{{ route('home') }}" class="institute_name">B I F C D</a></p>
        </div>
        <form action="">
            <label for="mail_or_num">E-mail or Number:</label>
            <input type="text" id="mail_or_num" placeholder="Enter your mail or number" required>
            
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" placeholder="Enter Your Password" required>
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
            
            <label for="button">
                <button>Sign In</button>
            </label>
            
            <label for="sign_up">
                <p>Need an account? <a href="{{ route('userregistration') }}" class="signup">Sign Up</a></p>
            </label>
        </form>
    </div>

    <script src="{{ asset('style/login.js') }}"></script>


@endsection