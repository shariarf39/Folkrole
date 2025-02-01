@extends('client.layouts.masterlayout')

@section('content')
<style>

.error-box {
    background: #ffebee;
    border-left: 5px solid #d32f2f;
    color: #d32f2f;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    font-weight: bold;
}
.error-box ul {
    margin: 5px 0 0;
    padding-left: 20px;
}
.error-box li {
    list-style: disc;
}
.fade-out {
    opacity: 0;
    transition: opacity 1s ease-out;
}


</style>


    <link rel="stylesheet" href="{{ asset('style/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="login_page">

 

        <form action="{{ route('userRegister') }}" method="POST">
        @csrf
        <div class="login">
            <img src="{{ asset('img/bifcd_lgo.png') }}" alt="Logo">
            <p>Sign up to <a href="{{ route('home') }}" class="institute_name">B I F C D</a></p>

            @if ($errors->any())
    <div class="error-box">
        <strong>⚠ Please fix the following errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


        </div>
        <label for="mail_or_num">Name:</label>
        <input type="text" id="mail_or_num" name="name"  placeholder="Name" required>
            <label for="mail_or_num">E-mail :</label>
            <input type="text" id="mail_or_num" name="email" placeholder="Enter your mail" required>

            <label for="mail_or_num">Phone :</label>
            <input type="text" id="mail_or_num" name="phone" placeholder="Phone" required>

            <label for="mail_or_num">Address</label>
            <input type="text" id="mail_or_num" name="address" placeholder="Enter your Address" required>
            
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
            
            <label for="button">
                <button>Sign Up</button>
            </label>
            <label for="sign_up">
                <p>Already have an account? <a href="{{ route('login') }}" class="signup">Sign In</a></p>
            </label>
            
        </form>
    </div>

    <script src="{{ asset('style/login.js') }}"></script>
    <script>
        setTimeout(() => {
          document.querySelector('.error-box')?.classList.add('fade-out');
        }, 5000);

    </script>


@endsection