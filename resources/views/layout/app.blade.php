<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GMF</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    @stack('css')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
    body{
        color: #23274D;
    }
    .navbar-nav .nav-item .nav-link i {
        color: #23274D;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background-color: #D9E8F0;>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand
            d-flex align-items-center justify-content-center href="">
            <div class="sidebar-brand-icon ">
                <div class="login-container">
                    <!-- Memanggil gambar logo -->
                    <img src="{{ asset('img/img_logo_garuda.png') }}" alt="Logo" class="logo" width="70%"
                        style="margin-top:30px; margin-left:20px;" class="mt-5 d-flex justify-content-center align-items-center">

                </div>

                </a>
                @include('sweetalert::alert')

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                @auth
                    @if (Auth::user()->role == 'admin')
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item {{ request()->routeIs('dashboard_admin') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard_admin') }}" style="color: black;">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <li class="nav-item {{ request()->routeIs('daily_inspection_admin') || request()->routeIs('last_inspection_admin') ? 'active' : '' }}">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapsePengguna" style="color: black;">
                                <i class="fas fa-chalkboard"></i>
                                <span>Inspection</span>
                            </a>
                            <div id="collapsePengguna" class="collapse {{ request()->routeIs('daily_inspection_admin') || request()->routeIs('last_inspection_admin') ? 'show' : '' }}"
                                aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item {{ request()->routeIs('daily_inspection_admin') ? 'active' : '' }}"
                                        href="{{ route('daily_inspection_admin') }}" style="color: black;">Daily Inspection</a>
                                    <a class="collapse-item {{ request()->routeIs('last_inspection_admin') ? 'active' : '' }}"
                                        href="{{ route('last_inspection_admin') }}" style="color: black;">Last Inspection</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item {{ request()->routeIs('data_inspector_admin') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_inspector_admin') }}" style="color: black;">
                                <i class="fas fa-users"></i>
                                <span>Data Inspector</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('data_barang_admin') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_barang_admin') }}" style="color: black;">
                                <i class="fas fa-users"></i>
                                <span>Data Items</span>
                            </a>
                        </li>



                    @endif
                @endauth

                @auth
                    @if (Auth::user()->role == 'inspector')
                     <!-- Nav Item - Dashboard -->
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard_inspector') }}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapsePengguna">
                            <i class="fas fa-chalkboard"></i>
                            <span>Inspection History Data</span></a>
                        </a>
                        <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('daily_inspection_inspector') }}">Daily Inspection</a>
                                <a class="collapse-item" href="{{ route('last_inspection_inspector') }}">Last Inspection</a>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('data_barang_inspector') }}">
                            <i class="fas fa-users"></i>
                            <span>Data Items</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-users"></i>
                            <span>Data Riwayat Pelaporan</span></a>
                    </li> --}}

                    @endif
                @endauth


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <!-- Logout Modal -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Pilih " Logout" di bawah ini jika Anda siap untuk
                    mengakhiri sesi Anda saat ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>


    </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        </div>

        @yield('content')

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; HF-Tech</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')

</body>

</html>
