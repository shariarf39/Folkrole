<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: black;
            color: white;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #495057 transparent;
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #495057;
            border-radius: 3px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            transition: .5s ease, .2s ease color;
            border: none;
            border-right: 1px solid transparent;
            border-left: 1px solid transparent;
            cursor: pointer;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background: white;
            color: black;
            border-right: 1px solid red;
            border-left: 1px solid red;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease-in-out;
            min-height: 100vh;
            background-color: #fff;
        }
        @media (max-width: 992px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .sidebar.active {
                width: 250px;
            }
            .content {
                margin-left: 0;
            }
            .content.active {
                margin-left: 250px;
            }
        }
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            font-size: 24px;
            cursor: pointer;
            color: black;
            background: white;
            border: black 1px solid;
            z-index: 1001;
        }
        .toggle-btn:focus {
            outline: none;
            color: white;
            background: black;
        }
    </style>
</head>
<body>

    <button class="toggle-btn d-lg-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

 

    <div class="sidebar" id="sidebar">
        <h4 class="text-center mt-3" >Dashboard</h4>
        <a href="{{ route('home') }}" class="text-center mt-3"> <h3> Home</h3> </a>
        <a href="{{ route('dashboard') }}" class="nav-link" data-url="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('profile')}}" class="nav-link" data-url="{{ route('profile')}}"><i class="fas fa-user"></i> Profile</a>
        <a href="{{route('joinclass')}}" class="nav-link" data-url="{{route('joinclass')}}"><i class="fas fa-cog"></i> Join Class</a>
        <a href="{{route('assignment')}}" class="nav-link" data-url="{{route('assignment')}}"><i class="fas fa-cog"></i> Submit Assignment</a>
        <a href="{{route('book')}}" class="nav-link" data-url="{{route('book')}}"><i class="fas fa-book"></i> My Book</a>
        <a href="{{route('courseplan')}}" class="nav-link" data-url="{{route('courseplan')}}"><i class="fas fa-graduation-cap"></i> My Course</a>
        <a href="{{ route('changePassword')}}" class="nav-link" data-url="{{ route('changePassword')}}"><i class="fas fa-lock"></i> Change Password</a>
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="content" id="content">
        <div id="page-content">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");
            sidebar.classList.toggle("active");
            content.classList.toggle("active");
        }

        $(document).ready(function() {
            function loadPage(url) {
                $("#page-content").html('<div class="text-center mt-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        $("#page-content").html(response);
                    },
                    error: function() {
                        $("#page-content").html("<p class='text-danger text-center'>Error loading page.</p>");
                    }
                });
            }

            // Load default dashboard
            loadPage("{{ route('dashboard') }}");

            $(".nav-link").click(function(e) {
                e.preventDefault();
                var url = $(this).data("url");

                if (url) {
                    loadPage(url);

                    if ($(window).width() <= 992) {
                        toggleSidebar();
                    }
                }
            });

            // Handle form submissions via AJAX
            $(document).on("submit", "form", function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr("action");
                var formData = form.serialize();

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#page-content").html(response);
                    },
                    error: function(xhr) {
                        $("#page-content").html("<p class='text-danger text-center'>Error processing request.</p>");
                    }
                });
            });
        });
    </script>

</body>
</html>
