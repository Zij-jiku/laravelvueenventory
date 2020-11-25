<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Dashboard | Moltran </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="author" name="Zij" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend_assets') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('backend_assets') }}/libs/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="{{ asset('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('backend_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
    <div id="app">
      <!-- Begin page -->
      <div id="wrapper">

        <nav id = "topbar" v-show = "$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true " style="display: none;">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend_assets') }}/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend_assets') }}/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend_assets') }}/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-face-profile"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-power-settings"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                        <router-link to="/home" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <img src="{{ asset('backend_assets') }}/images/logo-dark.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="{{ asset('backend_assets') }}/images/logo-sm.png" alt="" height="25">
                            </span>
                        </router-link>

                        <router-link to="/home" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="{{ asset('backend_assets') }}/images/logo-light.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="{{ asset('backend_assets') }}/images/logo-sm.png" alt="" height="25">
                            </span>
                        </router-link>
                    </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                       
                        <div class="user-box">
                
                            <div class="float-left">
                                <img src="{{ asset('backend_assets') }}/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                            </div>
                            <div class="user-info">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Hello <i class="mdi mdi-chevron-down"></i>
                                                    </a>
                                    <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock mr-2"></i> Lock screen</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power-settings mr-2"></i> Logout</a></li>
                                    </ul>
                                </div>
                                <p class="font-13 text-muted m-0">Administrator</p>
                            </div>
                        </div>

                        <ul class="metismenu" id="side-menu">
                            

                            <li>
                                <router-link to="/home" class="waves-effect">
                                    <i class="mdi mdi-alpha-d-circle"></i>
                                    <span> Dashboard </span>
                                </router-link>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-cart-arrow-right"></i>
                                    <span> Order </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-expense"> Order Add</router-link></li>
                                    <li><router-link to="/all-expense"> Order All</router-link></li>
                                </ul>
                            </li>

                            {{-- <li>
                                <a href="calendar.html" class="waves-effect">
                                    <i class=" mdi mdi-calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li> --}}

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-e-circle "></i>
                                    <span> Employee </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-employee"> Employee Add</router-link></li>
                                    <li><router-link to="/all-employee"> Employee All</router-link></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-s-circle "></i>
                                    <span> Suppliers </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-supplier"> Supplier Add</router-link></li>
                                    <li><router-link to="/all-supplier"> Supplier All</router-link></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-c-circle"></i>
                                    <span> Categories </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-category"> Category Add</router-link></li>
                                    <li><router-link to="/all-category"> Category All</router-link></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-p-circle"></i>
                                    <span> Product </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-product"> Product Add</router-link></li>
                                    <li><router-link to="/all-product"> Product All</router-link></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-x-circle"></i>
                                    <span> Expense </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/store-expense"> Expense Add</router-link></li>
                                    <li><router-link to="/all-expense"> Expense All</router-link></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-alpha-m-circle"></i>
                                    <span> Salary </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><router-link to="/given-salary"> Salary Add</router-link></li>
                                    <li><router-link to="/salary"> Salary All</router-link></li>
                                </ul>
                            </li>



                            {{-- mdi mdi-alpha-c-circle-outline  - customer --}}
                            {{-- mdi mdi-alpha-p-circle-outline  - Pos --}}
                    


{{-- 
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-map-marker"></i>
                                    <span> Maps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="maps-google.html"> Google Map</a></li>
                                    <li><a href="maps-vector.html"> Vector Map</a></li>
                                </ul>
                            </li> --}}



                            {{-- <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-map-marker"></i>
                                    <span> Maps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="maps-google.html"> Google Map</a></li>
                                    <li><a href="maps-vector.html"> Vector Map</a></li>
                                </ul>
                            </li> --}}



                            <li>
                                <router-link to="logout" class="waves-effect">
                                    <i class="mdi mdi-power"></i>
                                    <span> Logout </span>
                                </router-link>
                            </li>


                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->
    
            </div>
            <!-- Left Sidebar End -->
        </nav>    

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <router-view></router-view>
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2020 &copy; Inventory (POS) Software Created & Developed By <a href="#">Zij</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
    </div>

    
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{!! asset('backend_assets') !!}/js/vendor.min.js"></script>
    <script src="{!! asset('backend_assets') !!}/js/app.min.js"></script>

     <!-- Responsive Table js -->
     <script src="{{ asset('backend_assets') }}/libs/rwd-table/rwd-table.min.js"></script>

     <!-- Init js -->
     <script src="{{ asset('backend_assets') }}/js/pages/responsive-table.init.js"></script>

    <script>
        let token = localStorage.getItem('token');
        if(token) {
            $("#topbar").css("display","");
        }
    </script>
    

    

        

    </body>
</html>