<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminstyle/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('adminstyle/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('adminstyle/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminstyle/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('adminstyle/images/favicon.svg" type="image/x-icon')}}">
    @stack('css')
</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <h4>DASHBOARD</h4>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active">
                            <a href="./dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Cetagories</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="./products" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="./ordar" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Ordars</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="./users" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="./setting" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        @yield('contant')
    </div>
    
   
    <script src="{{asset('adminstyle/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('adminstyle/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminstyle/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('adminstyle/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('adminstyle/js/main.js')}}"></script>
    @stack('js');

  

</body>

</html>