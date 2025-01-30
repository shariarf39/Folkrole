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

    <!-- Sidebar Toggle Button -->
    <button class="toggle-btn d-lg-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4 class="text-center mt-3">Dashboard</h4>
        <a href="{{ route('dashboard') }}" class="nav-link" data-url="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('profile')}}" class="nav-link" data-url="{{ route('profile')}}"><i class="fas fa-user"></i> Profile</a>
        <a href="" class="nav-link" data-url=""><i class="fas fa-cog"></i> Settings</a>
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i> Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

</a>

    </div>

    <!-- Content Area -->
    <div class="content" id="content">
        <div id="page-content">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle and AJAX Loading -->
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");

            sidebar.classList.toggle("active");
            content.classList.toggle("active");
        }

        // AJAX Page Load
        $(document).ready(function() {
    var defaultUrl = "{{ route('dashboard') }}"; // Set default route
    $("#page-content").html('<div class="text-center mt-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');

    // Load default dashboard page
    $.ajax({
        url: defaultUrl,
        type: "GET",
        success: function(response) {
            $("#page-content").html(response);
        },
        error: function() {
            $("#page-content").html("<p class='text-danger text-center'>Error loading page.</p>");
        }
    });

    // Handle navigation clicks
    $(".nav-link").click(function(e) {
        e.preventDefault();
        var url = $(this).data("url");

        // Show loading spinner while content is being fetched
        $("#page-content").html('<div class="text-center mt-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');

        // Load new page content
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

        // Close sidebar on small screens after navigation
        if ($(window).width() <= 992) {
            toggleSidebar(); // Close the sidebar on small screens
        }
    });
});

    </script>

</body>
</html>
