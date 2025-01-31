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
            background: #343a40;
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
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background: #495057;
            padding-left: 25px;
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
            color: #343a40;
            background: transparent;
            border: none;
            z-index: 1001;
        }
        .toggle-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>

    <button class="toggle-btn d-lg-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    @if (session('status'))
    <script>alert('{{ session('status') }}')</script>
    @endif

    <div class="sidebar" id="sidebar">
        <h4 class="text-center mt-3">Dashboard</h4>
        <a href="{{ route('dashboard') }}" class="nav-link" data-url="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('profile')}}" class="nav-link" data-url="{{ route('profile')}}"><i class="fas fa-user"></i> Profile</a>
        <a href="#" class="nav-link" data-url="#"><i class="fas fa-cog"></i> Join Class</a>
        <a href="#" class="nav-link" data-url="#"><i class="fas fa-cog"></i> Submit Assignment</a>
        <a href="#" class="nav-link" data-url="#"><i class="fas fa-book"></i> My Book</a>
        <a href="#" class="nav-link" data-url="#"><i class="fas fa-graduation-cap"></i> My Course</a>
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
