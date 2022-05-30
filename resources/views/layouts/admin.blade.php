<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet" />



</head>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                 <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-">CV Sukses Motor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Main Page</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            {{-- <!-- Heading -->
            <div class="sidebar-heading">
                Menu Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> --}}

            {{-- <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div> --}}

            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::user()->jabatan == 'Admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Users</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Menu :</h6>
                        <a class="collapse-item" href="{{ url('/user/create') }}">Add User</a>
                        <a class="collapse-item" href="{{ url('/user') }}">View All Users</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->
            @if(Auth::user()->jabatan == 'Admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Employee Menu</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employee Menu :</h6>
                        <a class="collapse-item" href="{{ url('/peminjaman') }}">Loan</a>
                        <a class="collapse-item" href="{{ url('/pembayaran') }}">Payment</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Salary Collapse Menu -->
            @if(Auth::user()->jabatan == 'Admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSalary"
                    aria-expanded="true" aria-controls="collapseSalary">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Salary Menu</span>
                </a>
                <div id="collapseSalary" class="collapse" aria-labelledby="headingSalary"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Salary Menu :</h6>
                        <a class="collapse-item" href="{{ url('/gaji') }}">Salary</a>
                        <a class="collapse-item" href="{{ url('/absen') }}">Attendance</a>
                        <a class="collapse-item" href="{{ url('/lembur') }}">Overtime</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav" style="margin-left: auto">

            <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="">
                    @auth
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <a class="btn" href="user/{{ Auth::user()->id }}">
                            {{ auth()->user()->name }}
                            @if (Auth::user()->foto_karyawan)
                            <i class=""><img src="{{ asset('storage/'. Auth::user()->foto_karyawan) }}" alt="" style="width: 10%; border-radius: 50%"></i>
                            @else
                            <i class=""><img src="{{ asset('assets/image/PP.jpg') }}" alt="" style="width: 5%; border-radius: 50%"></i>
                            @endif
                            {{-- <i class="fas fa-fw fa-user"></i> --}}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-primary" href="">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="footer" style="text-align: center">
                <div class=" container-fluid ">
                    <div class="copyright" id="copyright">
                        &copy; <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date()
                                .getFullYear()))

                        </script>, Created by <a href="https://www.instagram.com/jerichohuangz26/"
                            target="_blank">Jericho</a> and <a href="https://www.instagram.com/nandonat_/"
                            target="_blank">Orlando</a>.
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('assets/DataTables/DataTables-1.10.24/js/dataTables.jqueryui.min') }}">
    </script>
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>
        $('#mydatatable').DataTable({
            "responsive": false,
            "dom": 'lf t ip',
            "filter": true,
            "lengthChange": false,
            "paging":   true,
            "ordering": true,
            "info":     false,
            "scrollX"   : false,

        });
    </script>




</body>

</html>
