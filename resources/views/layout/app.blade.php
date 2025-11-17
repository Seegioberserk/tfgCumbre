<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset ('CoolAdmin-master/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset ('CoolAdmin-master/vendor/fontawesome-6.7.2/css/all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset ('CoolAdmin-master/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset ('CoolAdmin-master/vendor/bootstrap-5.3.7.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset ('CoolAdmin-master/css/aos.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('CoolAdmin-master/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset ('CoolAdmin-master/css/swiper-bundle.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/css/theme.css')}}" rel="stylesheet" media="all">
     <link href="{{asset('CoolAdmin-master/css/estilos.css')}}" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset ('CoolAdmin-master/images/icon/logo.png')}}" alt="CoolAdmin" />
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
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
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
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('paginas.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('paginas.header')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       @yield('content')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <div class="row footer-bottom">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2025 Colorlib. All rights reserved. Template by 
                            <a href="#" rel="nofollow" target="_blank">Colorlib</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset ('CoolAdmin-master/js/vanilla-utils.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset ('CoolAdmin-master/vendor/bootstrap-5.3.7.bundle.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset ('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{asset ('CoolAdmin-master/vendor/chartjs/Chart.bundle.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{asset ('CoolAdmin-master/js/bootstrap5-init.js') }}"></script>
    <script src="{{asset ('CoolAdmin-master/js/main-vanilla.js') }}"></script>
    <script src="{{asset ('CoolAdmin-master/js/swiper-bundle.min.js') }}"></script>
    <script src="{{asset ('CoolAdmin-master/js/aos.js') }}"></script>
    <script src="{{asset ('CoolAdmin-master/js/modern-plugins.js') }}"></script>

</body>

</html>
<!-- end document-->
