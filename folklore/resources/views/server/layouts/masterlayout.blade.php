<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../backend/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/bifcd_lgo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="backend/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="backend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="backend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="backend/assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="backend/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <div class="mt-4">
                                <img src="img/bifcd_lgo.png" alt="girl-doing-yoga-light" width="140" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png" data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                            </div>
                        </span>

                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="#" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>


                    
                    <!-- Annaul Tour -->
                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Controll</span></li>
                    <li class="menu-item">
                        <a href="{{route('admin')}}" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">Admin</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{'adminCourse'}}" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">Course</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{'adminCourse'}}" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">Live Class</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{'adminCourse'}}" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">Check Attendence</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{'adminCourse'}}" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">Check Assignment</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="fa-solid fa-arrows-down-to-people me-2"></i>
                            <div data-i18n="Basic">book</div>
                        </a>
                    </li>
                    
            </aside>

            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">

            @hasSection('content')
            @yield('content')

            @else
            <h2>No content fount</h2>
            @endif

            </div>

            <!-- / End Menu -->


        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="backend/assets/vendor/js/bootstrap.js"></script>
    <script src="backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="backend/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="backend/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="backend/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>