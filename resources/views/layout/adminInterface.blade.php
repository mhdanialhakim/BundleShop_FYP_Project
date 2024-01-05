<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Thieves Thrift </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <link href="{{ asset('assets3/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @include ('sweetalert::alert')

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">
                Thieves Thrift
                {{-- <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt=""> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                {{-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div> --}}
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                           
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                        <div class="pulse-css"></div>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="all-notification"><h5>Notifications</h5></a>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                        <ul class="list-unstyled">
                                            <li class="media dropdown-item">                                           
                                                <span class="primary"><i class="ti-shopping-cart"></i></span>
                                                <a href="{{ url($notification->data['url'].'?id='.($notification->id)) }}">
                                                <div class="body">
                                                    
                                                        <h6>{{ $notification->data['title'] }}</h6>
                                                        <label><strong>{{ $notification->data['user_name'] }}</strong></label>
                                                        <label>{{ $notification->data['message'] }} <strong>{{ $notification->data['product_name'] }}. </strong></label>
                                                        <span class="notify-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                </div>
                                                </a> 
                                            </li>
                                        </ul>                   
                                        @endforeach
                                    @else
                                        <a class="all-notification">No notifications</a>
                                    @endif         
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a>
                                        <form action="{{ route('logout') }}" class="dropdown-item" method="POST">
                                            @csrf
                                            <i class="icon-key" type="submit"></i>
                                                <button class="btn btn-square btn-outline-light">Logout </button>                                      
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a class="" href="{{ url('dashboard') }}" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Dashboard</span></a>
                        {{-- <ul aria-expanded="false">
                            <li><a href="./index.html">Dashboard 1</a></li>
                            <li><a href="./index2.html">Dashboard 2</a></li>
                        </ul> --}}
                    </li>

                    <li class="nav-label">Shop</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="ti-bag"></i><span class="nav-text">Thieves Thrift Shop</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('home') }}">Home</a></li>
                            <li><a href="{{ route('shop') }}">Product</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Table</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('index-order') }}">Orders</a></li>
                            <li><a href="{{ url('index-product') }}">Products</a></li>
                            <li><a href="{{ url('index-user') }}">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    @yield('linkPages')
                    {{-- <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, {{ Auth::user()->name }} </h4>
                            <p class="mb-0">Thieves Thirft Admin</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Users Tabe</a></li>
                        </ol>
                    </div> --}}
                </div>
                <div class="row">
                    @yield('dashboard')
                    <div class="col-lg-12">
                        <div class="card">
                            @yield('cardTitle')
                            {{-- <div class="card-header">
                                <h4 class="card-title">Card Title</h4>
                            </div> --}}
                            <div class="card-body">
                                @yield('content')
                            </div>
                            {{-- <div class="card-footer">
                                Card footer
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div> --}}
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets3/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets3/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets3/js/custom.min.js') }}""></script>

    <script src="{{ asset('assets3/vendor/highlightjs/highlight.pack.min.js') }}"></script>
    <!-- Circle progress -->

</body>

</html>