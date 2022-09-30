<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Inventory</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/..assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="/index.html" class="logo">
                    <img src="/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
  
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                            </a>
                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">My Social Media</span>
                                    <span class="subtitle op-8"></span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                        <div class="row m-0">
                                            <a class="col-6 col-md-4 p-0" href="https://www.instagram.com/irulmasihbernapas/" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-instagram"></i>
                                                    <span class="text">Instagram</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="https://wa.me/085755427013" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-whatsapp"></i>
                                                    <span class="text">WhatsApp</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="https://www.youtube.com/channel/UCKWZjuRW0E_kS_ZSlHO0ovA" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-youtube"></i>
                                                    <span class="text">You Tube</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="https://www.facebook.com/muhamadairul.tcahsukorejo" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-facebook"></i>
                                                    <span class="text">Facebook</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="https://twitter.com/IrulMasihHidup" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-twitter"></i>
                                                    <span class="text">Twitter</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="https://t.me/RulIrulll" target="blank">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-message"></i>
                                                    <span class="text">Telegram</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @if (Auth::user()->level == 'admin')
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <!-- Profil -->
                    
                                    <img src="/assets/img/kei.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="/assets/img/kei.jpg"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fa fa-user"> My
                                                Profile</i></a>
                                        <a class="dropdown-item" href="/logout"><i class="fa fa-lock"> Logout</i></a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::user()->level == 'gudang')
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <!-- Profil -->
                    
                                    <img src="/assets/img/yaa.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="/assets/img/yaa.jpg"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fa fa-user"> My
                                                Profile</i></a>
                                        <a class="dropdown-item" href="/logout"><i class="fa fa-lock"> Logout</i></a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        @if (Auth::user()->level == 'admin')
    
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <!-- Profil -->
                            <img src="/assets/img/kei.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">{{ Auth::user()->level }}</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @endif

        @if (Auth::user()->level == 'gudang')
    
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <!-- Profil -->
                            <img src="/assets/img/yaa.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">{{ Auth::user()->level }}</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @endif

                    <ul class="nav nav-primary">
                        <li class="nav-item">
                            <a href="/home">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span> 
                            <h4 class="text-section">Components</h4>
                        </li>

                        @if (Auth::user()->level == 'admin')

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Data Master</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/user">
                                            <span class="sub-item">Data User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/kategori">
                                            <span class="sub-item">Data Kategori</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/barang">
                                            <span class="sub-item">Data Barang</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#laporan">
                                <i class="fas fa-file"></i>
                                <p>Data Laporan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="laporan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/lap_user">
                                            <span class="sub-item">Laporan Data User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/lap_kategori">
                                            <span class="sub-item">Laporan Data Kategori</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/lap_barang">
                                            <span class="sub-item">Laporan Data Barang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/lap_brg_msk">
                                            <span class="sub-item">Laporan Data Barang Masuk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/lap_brg_keluar  ">
                                            <span class="sub-item">Laporan Data Barang Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if (Auth::user()->level == 'gudang')
                        <li class="nav-item">
                            <a href="/brg_msk">
                                <i class="fas fa-briefcase"></i>
                                <p> Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/brg_keluar">
                                <i class="fas fa-briefcase"></i>
                                <p> Barang Keluar</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
@include('sweetalert::alert')
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Atlantis JS -->
    <script src="/assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="/..assets/js/setting-demo2.js"></script>

    <!-- SweetAlert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {

            //== Demos
            var initDemos = function() {
                swal({
                    title : "{{ session('success') }}",
                    text  : "{{ session('success') }}",
                    icon  : "success",
                    buttons: {
                        confrim: {
                            text : "Konfirmasi",
                            value : true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            }
        };

        return {
            //== Init
            init: function {
                initDemos();
            }
        }
    </script>
    @endif

    @if (session('warning'))
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {

            //== Demos
            var initDemos = function() {
                swal({
                    title : "{{ session('warning') }}",
                    text  : "{{ session('warning') }}",
                    icon  : "warning",
                    buttons: {
                        confrim: {
                            text : "Konfirmasi",
                            value : true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            }
        };

        return {
            //== Init
            init: function {
                initDemos();
            }
        }
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({});
        });
    </script>

</body>

</html>
