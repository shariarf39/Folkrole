<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANGLADESH INSTITUTE OF FOLKLORE AND COMMUNITY DEVELOPMENT</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="icon" href="img/bifcd_lgo.png" type="image/png">
</head>

<body>

    <!-- Navbar Section -->


<header id="header">
    <div class="container">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="img/bifcd_logos.png" alt="BIFCD Logo"></a>
        </div>
         
        <nav>
            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>
                    <a href="#">Who We Are ▾</a>
                    <ul class="dropdown">
                        <li><a href="{{route('aboutpage')}}">About Us</a></li>
                        <li><a href="{{route('management')}}">Management</a></li>
                    </ul>
                </li>
                <li><a href="{{route('newsevent')}}">News & Events</a></li>
                <li><a href="{{route('gallerysec')}}">Gallery</a></li>
                <li><a href="{{route('Publications')}}">Publications</a></li>
                <li><a href="{{route('contactus')}}">Contact Us</a></li>
                <li><a href="{{route('donate')}}">Donate</a></li>

                @if(Auth::check())
               <li>
                   <a href="{{ route('userDhashboard') }}">
                       <i class="fas fa-user"></i> {{ Auth::user()->name }}
                   </a>
               </li>
               <li>
                   <form action="{{ route('logout') }}" method="POST">
                       @csrf
                       <button class="join-btn login" type="submit">Logout</button>
                      </form>
               </li>
                @else
                    <!-- Show Sign In/Sign Up -->              
                    <li><a href="{{route('login')}}" class="join-btn login">Login</a></li>
                    <li><a href="{{route('userregistration')}}" class="join-btn registration">Registration</a></li>
                @endif



               
               
            </ul>
        </nav>
        <button id="menu-toggle" class="menu-toggle" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
    </div>
</header>










<main>
        @hasSection('content')
        @yield('content')

        @else
        <h2>No content fount</h2>
        @endif
    </main>


    <!-- social media section -->

    <div class="social_media_sec">
        <p class="institute_bifcd">BANGLADESH INSTITUTE OF FOLKLORE AND COMMUNITY DEVELOPMENT</p>
        <div class="hr"></div>
        <div class="social">
            <div class="social_sec">
                <p>Get connected with us on social networks!</p>
                <div class="social_link">
                    <a href="https://www.facebook.com/share/18aGxZqYA5/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/in/anwarul-karim-7411503b/?originalSubdomain=bd" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer Section -->

    <footer id="footer">
        <div class="footer_sec">
            <div class="footer_box">
                <!-- <a href="" class="institute">BANGLADESH INSTITUTE OF FOLKLORE AND COMMUNITY DEVELOPMENT</a> -->
                <a href="{{route('home')}}" class="institute BIFCD">B I F C D</a>
                <a href="tel:+880
                        1755-513176" class="about_lik"><i class="fa-solid fa-phone"></i> &nbsp;&nbsp;+880
                    1755-513176</a>
                <a href="mailto: dranwar.karim@gmail.com" class="about_lik"><i
                        class="fa-solid fa-envelope"></i>&nbsp;&nbsp;dranwar.karim@gmail.com</a>
                <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Ishordi Road, Kushtia-7000,
                    Bangladesh</p>
            </div>
            <div class="footer_box">
                <p class="who_we_are">OUR COURSE PLAN</p>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Introduction to
                    Folklore</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Folklore and Cultural
                    Studies</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Stories and
                    Traditions</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Comparative Folklore</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Folklore and Oral
                    Literature</a>
            </div>
            <div class="footer_box">
                <p class="who_we_are">WHO WE ARE</p>
                <a href="{{route('aboutpage')}}" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;About Us</a>
                <a href="{{route('contactus')}}" class="about_lik"><i
                        class="fa-solid fa-circle"></i>&nbsp;&nbsp;Contact Us</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Terms of Conditions</a>
                <a href="" class="about_lik"><i class="fa-solid fa-circle"></i>&nbsp;&nbsp;Privacy Policy</a>
            </div>

            <div class="footer_box">
                <form action="">
                    <input type="search" placeholder="Email..." required>
                    <input type="search" placeholder="Subject..." required>
                    <textarea name="" id="" placeholder="Comments..." required></textarea>
                    <button></i>Comments</button>
                </form>
            </div>
        </div>



        <div class="footer_text">
            <div class="fotter1">
                <p>© Copyright 2025 BIFCD . All Rights
                    Reserved</p>
                <p>Designed & Developed By&nbsp;&nbsp;<a href="">Fabtech IT</a></p>
            </div>
            <div class="footer2">
                <a href="#"><i class="fa-solid fa-arrow-up"></i></a>
            </div>
        </div>

    </footer>








</body>

<script src="style/style.js"></script>
<script src="{{asset('style/style.js')}}"></script>
    </html>