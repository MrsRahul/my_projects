<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard_select')">
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{url('admin/brand')}}">
                                <i class="fas fa-tachometer-alt"></i>Brand</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-tachometer-alt"></i>Category</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{url('admin/coupon')}}">
                                <i class="fas fa-tachometer-alt"></i>Coupon</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{url('admin/size')}}">
                                <i class="fas fa-tachometer-alt"></i>Size</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{url('admin/color')}}">
                                <i class="fas fa-tachometer-alt"></i>Color</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('tax_select')">
                            <a href="{{url('admin/tax')}}">
                                <i class="fas fa-tachometer-alt"></i>Tax</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{url('admin/product')}}">
                                <i class="fas fa-tachometer-alt"></i>Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('customers_select')">
                            <a href="{{url('admin/customers')}}">
                                <i class="fas fa-user"></i>Customer</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{url('admin/brand')}}">
                                <i class="fas fa-tachometer-alt"></i>Brand</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-tachometer-alt"></i>Category</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{url('admin/coupon')}}">
                                <i class="fas fa-tachometer-alt"></i>Coupon</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{url('admin/size')}}">
                                <i class="fas fa-tachometer-alt"></i>Size</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{url('admin/color')}}">
                                <i class="fas fa-tachometer-alt"></i>Color</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('tax_select')">
                            <a href="{{url('admin/tax')}}">
                                <i class="fas fa-tachometer-alt"></i>Tax</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            </ul>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{url('admin/product')}}">
                                <i class="fas fa-tachometer-alt"></i>Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>
                        <li class="@yield('customers_select')">
                            <a href="{{url('admin/customers')}}">
                                <i class="fas fa-user"></i>Customer</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                            </ul>
                        </li>                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @section('container')
                        @show 
                        
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->