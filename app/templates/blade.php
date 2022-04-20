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

    <!-- END : THIS NEED TO REPLACE FROM TEMPLATE ASSET -->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('framework/css/pre.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('framework/css/jquery.skeleton.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('framework/js/axios.min.js') }}"></script>
    <script src="{{ asset('framework/js/common.js') }}"></script>
    <script src="{{ asset('framework/js/jquery.scheletrone.js') }}"></script>
    <!--end::Global Javascript Bundle-->


</head>
<!--end::Head-->

<!--begin::Body-->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{ asset('images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="{{ asset('images/users/user-4.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            Nowak <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="contacts-profile.html" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="auth-logout.html" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo-light.png') }}" alt="" height="16">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="" height="16">
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

                    <img src="{{ asset('images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">Nowak Helme</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>

                    <p class="text-muted left-user-info">Admin Head</p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted left-user-info">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="index.html">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="badge bg-success rounded-pill float-end">9+</span>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Apps</li>

                        <li>
                            <a href="apps-calendar.html">
                                <i class="mdi mdi-calendar-blank-outline"></i>
                                <span> Calendar </span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.html">
                                <i class="mdi mdi-forum-outline"></i>
                                <span> Chat </span>
                            </a>
                        </li>

                        <li>
                            <a href="#email" data-bs-toggle="collapse">
                                <i class="mdi mdi-email-outline"></i>
                                <span> Email </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="email">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="email-inbox.html">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="email-templates.html">Email Templates</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-outline"></i>
                                <span> Tasks </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="task-kanban-board.html">Kanban Board</a>
                                    </li>
                                    <li>
                                        <a href="task-details.html">Details</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="apps-projects.html">
                                <i class="mdi mdi-briefcase-variant-outline"></i>
                                <span> Projects </span>
                            </a>
                        </li>

                        <li>
                            <a href="#contacts" data-bs-toggle="collapse">
                                <i class="mdi mdi-book-open-page-variant-outline"></i>
                                <span> Contacts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="contacts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="contacts-list.html">Members List</a>
                                    </li>
                                    <li>
                                        <a href="contacts-profile.html">Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Custom</li>

                        <li>
                            <a href="#sidebarAuth" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-plus-outline"></i>
                                <span> Auth Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="auth-login.html">Log In</a>
                                    </li>
                                    <li>
                                        <a href="auth-register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="auth-recoverpw.html">Recover Password</a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen.html">Lock Screen</a>
                                    </li>
                                    <li>
                                        <a href="auth-confirm-mail.html">Confirm Mail</a>
                                    </li>
                                    <li>
                                        <a href="auth-logout.html">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarExpages" data-bs-toggle="collapse">
                                <i class="mdi mdi-file-multiple-outline"></i>
                                <span> Extra Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExpages">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="pages-starter.html">Starter</a>
                                    </li>
                                    <li>
                                        <a href="pages-pricing.html">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="pages-timeline.html">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="pages-faqs.html">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="pages-gallery.html">Gallery</a>
                                    </li>
                                    <li>
                                        <a href="pages-404.html">Error 404</a>
                                    </li>
                                    <li>
                                        <a href="pages-500.html">Error 500</a>
                                    </li>
                                    <li>
                                        <a href="pages-maintenance.html">Maintenance</a>
                                    </li>
                                    <li>
                                        <a href="pages-coming-soon.html">Coming Soon</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarLayouts" data-bs-toggle="collapse">
                                <i class="mdi mdi-dock-window"></i>
                                <span> Layouts </span>
                                <span class="menu-arrow"></span>

                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="layouts-horizontal.html">Horizontal</a>
                                    </li>
                                    <li>
                                        <a href="layouts-preloader.html">Preloader</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Components</li>

                        <li>
                            <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                <i class="mdi mdi-briefcase-outline"></i>
                                <span> Base UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="ui-buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="ui-cards.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="ui-avatars.html">Avatars</a>
                                    </li>
                                    <li>
                                        <a href="ui-tabs-accordions.html">Tabs & Accordions</a>
                                    </li>
                                    <li>
                                        <a href="ui-modals.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="ui-progress.html">Progress</a>
                                    </li>
                                    <li>
                                        <a href="ui-notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="ui-offcanvas.html">Offcanvas</a>
                                    </li>
                                    <li>
                                        <a href="ui-placeholders.html">Placeholders</a>
                                    </li>
                                    <li>
                                        <a href="ui-spinners.html">Spinners</a>
                                    </li>
                                    <li>
                                        <a href="ui-images.html">Images</a>
                                    </li>
                                    <li>
                                        <a href="ui-carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="ui-video.html">Embed Video</a>
                                    </li>
                                    <li>
                                        <a href="ui-dropdowns.html">Dropdowns</a>
                                    </li>
                                    <li>
                                        <a href="ui-tooltips-popovers.html">Tooltips & Popovers</a>
                                    </li>
                                    <li>
                                        <a href="ui-general.html">General UI</a>
                                    </li>
                                    <li>
                                        <a href="ui-typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="ui-grid.html">Grid</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="widgets.html">
                                <i class="mdi mdi-gift-outline"></i>
                                <span> Widgets </span>
                            </a>
                        </li>

                        <li>
                            <a href="#sidebarExtendedui" data-bs-toggle="collapse">
                                <i class="mdi mdi-layers-outline"></i>
                                <span class="badge bg-info float-end">Hot</span>
                                <span> Extended UI </span>
                            </a>
                            <div class="collapse" id="sidebarExtendedui">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="extended-range-slider.html">Range Slider</a>
                                    </li>
                                    <li>
                                        <a href="extended-sweet-alert.html">Sweet Alert</a>
                                    </li>
                                    <li>
                                        <a href="extended-draggable-cards.html">Draggable Cards</a>
                                    </li>
                                    <li>
                                        <a href="extended-tour.html">Tour Page</a>
                                    </li>
                                    <li>
                                        <a href="extended-notification.html">Notification</a>
                                    </li>
                                    <li>
                                        <a href="extended-treeview.html">Tree View</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarIcons" data-bs-toggle="collapse">
                                <i class="mdi mdi-shield-outline"></i>
                                <span> Icons </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarIcons">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="icons-feather.html">Feather Icons</a>
                                    </li>
                                    <li>
                                        <a href="icons-mdi.html">Material Design Icons</a>
                                    </li>
                                    <li>
                                        <a href="icons-dripicons.html">Dripicons</a>
                                    </li>
                                    <li>
                                        <a href="icons-font-awesome.html">Font Awesome 5</a>
                                    </li>
                                    <li>
                                        <a href="icons-themify.html">Themify</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarForms" data-bs-toggle="collapse">
                                <i class="mdi mdi-texture"></i>
                                <span> Forms </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="forms-elements.html">General Elements</a>
                                    </li>
                                    <li>
                                        <a href="forms-advanced.html">Advanced</a>
                                    </li>
                                    <li>
                                        <a href="forms-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="forms-wizard.html">Wizard</a>
                                    </li>
                                    <li>
                                        <a href="forms-quilljs.html">Quilljs Editor</a>
                                    </li>
                                    <li>
                                        <a href="forms-pickers.html">Picker</a>
                                    </li>
                                    <li>
                                        <a href="forms-file-uploads.html">File Uploads</a>
                                    </li>
                                    <li>
                                        <a href="forms-x-editable.html">X Editable</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarTables" data-bs-toggle="collapse">
                                <i class="mdi mdi-table"></i>
                                <span> Tables </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="tables-basic.html">Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatables.html">Data Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-editable.html">Editable Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-responsive.html">Responsive Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-tablesaw.html">Tablesaw Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarCharts" data-bs-toggle="collapse">
                                <i class="mdi mdi-chart-donut-variant"></i>
                                <span> Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="charts-flot.html">Flot Charts</a>
                                    </li>
                                    <li>
                                        <a href="charts-morris.html">Morris Charts</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs.html">Chartjs Charts</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartist.html">Chartist Charts</a>
                                    </li>
                                    <li>
                                        <a href="charts-sparklines.html">Sparkline Charts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarMaps" data-bs-toggle="collapse">
                                <i class="mdi mdi-map-outline"></i>
                                <span> Maps </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="maps-google.html">Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                                <i class="mdi mdi-share-variant"></i>
                                <span> Multi Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMultilevel">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                            Second Level <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarMultilevel2">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                            Third Level <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarMultilevel3">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                        Item 2 <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarMultilevel4">
                                                        <ul class="nav-second-level">
                                                            <li>
                                                                <a href="javascript: void(0);">Item 1</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
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
                                <a href="javascript:void(0)" class="footer-link me-4" >License</a>
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

    <!-- Vendor -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>

    <!-- knob plugin -->
    <script src="{{ asset('libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboar init js-->
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('js/app.min.js') }}"></script>

</body>
<!--end::Body-->

</html>

@include('app.views.modals._modalLogout')
@include('app.views.modals._modalGeneral')
@include('public.framework.php.general')