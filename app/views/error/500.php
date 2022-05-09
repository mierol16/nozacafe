<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> {{ $title }} | {{ $_ENV['APP_NAME'] }} </title>
    <meta charset="utf-8" />
    <meta name="description" content="Canthink Framework by Canthink Solution" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('framework/favicon.ico') }}" />

    <!-- App css -->

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="{{ url('dashboard') }}" class="logo">
                                <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22" class="logo-light mx-auto">
                            </a>
                            <h4 class="text-muted text-dark mt-2 mb-4">Noza Cafe</h4>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center">
                                    <h1 class="text-error">505</h1>
                                    <h3 class="mt-3 mb-2">Internal Server Error</h3>
                                    <p class="text-muted mb-3">Why not try refreshing your page?</p>

                                    <a href="{{ url('dashboard') }}" class="btn btn-danger waves-effect waves-light"><i class="fas fa-home me-1"></i> Back to Home</a>
                                </div>
    

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor -->
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/app.min.js') }}"></script>

    </body>

</html>