<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="English 4 Future">
    <meta name="description" content="English 4 Future">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('mdb5/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('mdb5/css/mdb.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('themes/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            height: 300px;
            width: 100%;
        }

        ,
        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height: 300px;
            width: 100%;
        }
    </style>
    <!-- Bootstrap tether Core JavaScript -->
    @yield('css')
</head>

<body>
    <!-- Navbar -->
    <header id="nav__header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#"><img id="MDB-logo" src="{{ asset('favicon/pngegg.png') }}"
                        alt="MDB Logo" draggable="false" height="45" /></a>

                <!-- Toggle button -->
                <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#main_nav" aria-controls="main_nav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="d-flex justify-content-start align-items-center">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="tel:09xxxxx512"><i class="fas fa-phone pe-2"></i> 09xxxxx512</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mail:english4future@gmail.com"><i
                                    class="fas fa-envelope pe-2 mb-0"></i>
                                english4future@gmail.com</a>
                        </li> --}}
                    </ul>

                    <ul class="navbar-nav">
                        @auth
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 18px;">
                                <img src="{{ asset(Auth::user()->image) }}" alt="avatar user" class="m-2"
                                    width="31">{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                style="margin-top: 55px;margin-left: 15px;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('change-infomation') }}"><i
                                        class="ti-user m-r-5 m-l-5"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout m-r-5 m-l-5"></i>
                                    Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    Register
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!-- Collapsible wrapper -->
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg" id="nav_menu">
            <div class="container justify-content-end">
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;" class="nav-item p-2"><a
                                class="nav-link" href="{{ route('home') }}"> Home </a></li>
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;" class="nav-item p-2"><a
                                class="nav-link" href="{{ route('news') }}"> News </a></li>
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;" class="nav-item p-2"><a
                                class="nav-link" href="{{ route('home.about-us') }}"> About Us </a></li>
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;" class="nav-item p-2"><a
                                class="nav-link" href="{{ route('test.list') }}"> Test Online </a></li>
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;" class="nav-item p-2"><a
                                class="nav-link" href="#"> Quiz </a></li>
                        <li style="margin-right: 2px;font-size: 18px;font-family:sans-serif;"
                            class="nav-item p-2 dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Practice
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a style="font-size: 15px;" class="dropdown-item" href="#"> Submenu item
                                        1</a></li>
                                <li><a style="font-size: 15px;" class="dropdown-item" href="#"> Submenu item 2
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <footer class="bg-dark text-center text-lg-start text-white">
        <!-- Grid container -->
        <div class="container-fluid p-4">
            <!--Grid row-->
            <div class="row my-4">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto"
                        style="width: 150px; height: 150px;">
                        <img src="{{ asset('favicon/pngegg.png') }}" height="70" alt=""
                            loading="lazy" />
                    </div>

                    <p class="text-center">Quality guarantee to each person comes to us. We are the best of the Class.
                    </p>

                    <ul class="list-unstyled d-flex flex-row justify-content-center">
                        <li>
                            <a class="text-white px-2" href="#!">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a class="text-white px-2" href="#!">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a class="text-white ps-2" href="#!">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="100%" height="300" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=4%20Nguy%E1%BB%85n%20V%C4%83n%20b%E1%BA%A3o&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Contact</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i>4 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành phố
                                Hồ Chí Minh</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2"></i>+ 84 692 365 12</p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>english4future@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
    </footer>
    <script type="text/javascript" src="{{ asset('mdb5/js/mdb.min.js') }}"></script>

    <script src="{{ asset('themes/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('asset/js/sticky-top.js') }}"></script>
    @yield('js')
</body>

</html>
