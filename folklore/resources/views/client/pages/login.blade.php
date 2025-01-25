@extends('client.layouts.masterlayout')

@section('content')
<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        padding: 10px;
        border-radius: 5px;
        margin: 20px auto; /* Centers the box horizontally */
        text-align: center; /* Centers the text inside the box */
        max-width: 400px; /* Optional: To limit the width of the alert box */
    }
</style>



@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <link rel="stylesheet" href="{{ asset('style/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="login_page">

        <form action="{{ route('userLogin') }}" method="POST">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('successLogin'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <div class="login">
                <img src="{{ asset('img/bifcd_lgo.png') }}" alt="Logo">
                <p>Sign in to <a href="{{ route('home') }}" class="institute_name">B I F C D</a></p>
        </div>
            <label for="mail_or_num">E-mail:</label>
            <input type="text" id="mail_or_num" name="email" placeholder="Enter your mail" required>
            
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name ="password" placeholder="Enter Your Password" required>
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