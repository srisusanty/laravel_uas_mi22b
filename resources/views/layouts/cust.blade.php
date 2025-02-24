<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/niceadmin/img/favicon.png" rel="icon">
    <link href="/niceadmin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/niceadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/niceadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/niceadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/niceadmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/niceadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/niceadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/niceadmin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/niceadmin/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jul 27 2023 with Bootstrap v5.3.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    @stack('style')
    <title>Dashboard</title>
</head>

<body style="background: #edf2f7">


    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center bg-dark">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('front.index') }}" class="logo d-flex align-items-centern text-light">
                Customer
            </a>
            <i class="bi bi-list toggle-sidebar-btn text-light"></i>
        </div><!-- End Logo -->

        {{-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
              <input type="text" name="query" placeholder="Search" title="Enter search keyword">
              <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End Search Bar -->
       --}}
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0 text-light" href="#"
                        data-bs-toggle="dropdown">

                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center"> <i
                                        class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span></button>
                            </form>
                            {{-- <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a> --}}
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar bg-dark">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">Menu</li>
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('customer.index') ? 'active' : 'collapsed' }}"
                    href="{{ route('customer.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>


            </li>


            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('myorder') ? 'active' : 'collapsed' }}"
                    href="{{ route('myorder') }}">
                    <i class="bi bi-cart"></i>
                    My Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('mypayment') ? 'active' : 'collapsed' }}"
                    href="{{ route('mypayment') }}">
                    <i class="bi bi-info-circle"></i>
                    <span>My Payment</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('myreview') ? 'active' : 'collapsed' }}"
                    href="{{ route('myreview') }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Review/Kritikan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('profile-customer') ? 'active' : 'collapsed' }}"
                    href="{{ route('profile-customer') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <!-- End Forms Nav -->
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('supplier.index') ? 'active' : 'collapsed' }}"
                    href="{{ route('supplier.index') }}">
                    <i class="ri-file-pdf-fill"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('report.admin') ? 'active' : 'collapsed' }}"
                    href="{{ route('report.admin') }}">
                    <i class="ri-file-pdf-fill"></i>
                    <span>Transaksi penjualan</span>
                </a>
            </li> --}}

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('contents')
    </main>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="/niceadmin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/niceadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/niceadmin/vendor/chart.js/chart.umd.js"></script>
    <script src="/niceadmin/vendor/echarts/echarts.min.js"></script>
    <script src="/niceadmin/vendor/quill/quill.min.js"></script>
    <script src="/niceadmin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/niceadmin/vendor/tinymce/tinymce.min.js"></script>
    <script src="/niceadmin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/niceadmin/js/main.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
    @stack('script')

</body>

</html>
