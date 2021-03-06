<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="{{ base_url }}">
    <title> {{ $title }} | {{ $_ENV['APP_NAME'] }} </title>
    <meta charset="utf-8" />
    <meta name="description" content="Cathink Framework by Canthink Solution" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('framework/favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base_url" content="{{ base_url }}" />

    <!-- START : THIS NEED TO REPLACE FROM TEMPLATE ASSET -->

    <!-- App css -->

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('framework/vendor/cute-alert/cute-alert.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('framework/vendor/cute-alert/style.css') }}">

    <link href="{{ asset('libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- END : THIS NEED TO REPLACE FROM TEMPLATE ASSET -->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('framework/css/pre.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->

    <!-- Vendor -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('libs/moment/min/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js" integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('framework/js/axios.min.js') }}"></script>
    <script src="{{ asset('framework/js/common.js') }}"></script>
    <!--end::Global Javascript Bundle-->

</head>
<!--end::Head-->

<!--begin::Body-->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="gradient" data-leftbar-size='default' data-sidebar-user='true'>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                @include('app.templates.notification')

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?= base_url; ?>public/upload/image/user/{{ session()->get('avatar') }}" alt="user-image" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-center m-0">Welcome<br>{{ session()->get('userPreferredName') }} !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{ url('user/profile') }}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <!-- <a href="{{ url('profile/setting') }}" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>Settings</span>
                        </a> -->

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="auth-logout.html" class="dropdown-item notify-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('dashboard') }}" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <!-- <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22"> -->
                        <h3 class="mt-3">Noza Cafe</h3>
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">{{ $title }}</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">

                    <img src="<?= base_url; ?>public/upload/image/user/{{ session()->get('avatar') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">{{ session()->get('userPreferredName') }}</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="{{ url('user/profile') }}" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a> -->

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>

                    <p class="text-muted left-user-info">{{ session()->get('roleName') }}</p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('user/profile') }}" class="text-muted left-user-info">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menuitem-<?= ($currentSidebar == 'dashboard') ? 'active' : '' ?>">
                            <a href="{{ url('dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title">GENERAL</li>

                        <?php if (session()->get('roleID') == 1) { ?>
                            @include('app.templates.menu.superadmin_menu')
                        <?php } else if (session()->get('roleID') == 2) { ?>
                            @include('app.templates.menu.administrator_menu')
                        <?php } else if (session()->get('roleID') == 3) { ?>
                            @include('app.templates.menu.staff_menu')
                        <?php }  ?>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Modal Preview PDF -->
            <div class="modal fade" id="previewPdfModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="previewPdfModalLabel">Preview</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="showNotFoundPDF" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"></div>
                            <div id="showPDF" style="display: none;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Develop by <a href="javascript:void(0)" class="footer-link fw-semibold">CanThink Solution</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0)" class="footer-link me-4">License</a>
                                <a href="javascript:void(0)" class="footer-link d-none d-sm-inline-block">Support</a>
                            </div>
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

    <!-- Dashboar init js-->
    <!-- <script src="{{ asset('js/pages/dashboard.init.js') }}"></script> -->
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('libs/fullcalendar/main.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('js/pages/calendar.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            getNotification();
        });

        async function markAllRead() {
            const res = await callApi('post', "notification/markAllRead");
            if (isSuccess(res.status)) {
                getNotification();
            }
        }

        async function getNotification() {
            const res = await callApi('post', "notification/getListNotiByUser");

            if (isSuccess(res.status)) {
                const data = res.data;
                const count = data.countUnread;
                const notiArr = data.listNoti;
                $('#countUnreadNoti').text(count);
                if (count > 0) {
                    $('#listnotification').empty(); // reset list
                    notiArr.forEach(function(data) {
                        var typeDisplay = '';
                        var notiID = data.noti_id;
                        var type = data.noti_type;
                        var text = data.noti_text;
                        var name = data.user_preferred_name;
                        // var date = moment(data.created_at).format("DD/MM/YYYY");
                        var date = '';

                        if (type == 1) {
                            typeDisplay = '<i class="mdi mdi-calendar-alert"></i>';
                        } else if (type == 2) {
                            typeDisplay = '<i class="mdi mdi-file-alert"></i>';
                        }

                        var url = 'redirectNoti("' + data.noti_redirect + '",' + notiID + ')';
                        var redirect = (data.noti_redirect != null) ? 'onclick=' + url : '';
                        var noti = '<a href="javascript:void(0)" class="dropdown-item notify-item" ' + redirect + '>\
                                        <div class="notify-icon bg-primary">\
                                            ' + typeDisplay + '\
                                        </div>\
                                        <p class="notify-details text-bold">' + ucfirst(name) + '</p>\
                                        <p class="text-muted mb-0 user-msg">\
                                            <small>' + text + '</small>\
                                        </p>\
                                    </a>';

                        $('#listnotification').append(noti);
                    });
                } else {
                    $('#listnotification').empty();
                    var noti = '<li class="list-group-item list-group-item-action dropdown-notifications-item">\
                                    <div class="d-flex">\
                                        No new notification\
                                    </div>\
                                </li>';
                    $('#listnotification').append(noti);
                }
            }
        }

        async function readNoti(id) {
            const res = await callApi('post', "notification/read", id);
            if (isSuccess(res.status)) {
                getNotification();
            }
        }

        function redirectNoti(url, id) {
            readNoti(id);
            setTimeout(function() {
                window.location.href = url;
            }, 250);

        }

        async function removeNoti(id) {
            const res = await callApi('post', "notification/delete", id);

            if (isSuccess(res.status)) {
                getNotification();
            }
            // alert(id);
            // console.log(id);
        }

        function previewPDF(fileLoc, fileMime) {
            var height = (fileMime == 'application/pdf') ? '650px' : 'auto';
            $('#showPDF').empty();
            $('#previewPdfModal').modal('show');
            $('#previewPdfModal').css('z-index', 1500);
            $('#showPDF').css('display', 'block');
            $('#showPDF').append('<object type="' + fileMime + '" data="' + fileLoc + '" width="100%" height="' + height + '"></object>');
        }

        function downloadPDF(fileLoc, fileType) {
            // console.log(data);
            var a = document.createElement('a');
            // var url = window.URL.createObjectURL(data);
            a.href = fileLoc;
            a.download = "Payment";
            document.body.append(a);
            a.click();
            a.remove();
        }

        function print(idToPrint, idBtn = 'printBtn') {
            $("#" + idToPrint).printThis({
                importCSS: true,
                importStyle: true,
                beforePrintEvent: $("#" + idBtn).html('<i class="fas fa-spinner"> </i> Being processed...'),
                beforePrint: $("#" + idBtn).attr('disabled', true),
            });

            setTimeout(function() {
                $("#" + idBtn).html('<i class="fas fa-print"> </i> Print');
                $("#" + idBtn).attr('disabled', false);
            }, 800);
        }
    </script>

</body>
<!--end::Body-->

</html>

@include('app.views.modals._modalLogout')
@include('app.views.modals._modalGeneral')
@include('public.framework.php.general')