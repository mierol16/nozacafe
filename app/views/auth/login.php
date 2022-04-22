<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ base_url }}public/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> {{ $title }} | {{ $_ENV['APP_NAME'] }} </title>
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="base_url" content="{{ base_url }}" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- App css -->

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('framework/vendor/cute-alert/cute-alert.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('framework/vendor/cute-alert/style.css') }}">

    <script src="{{ asset('framework/js/axios.min.js') }}"></script>
    <script src="{{ asset('framework/js/common.js') }}"></script>
    
    <!-- beautify ignore:end -->

<style>
    body {
        background-size: contain;
        background-attachment: fixed;
        background-position-y: bottom;
        background-repeat: no-repeat;
        /* font-family: 'Quicksand', sans-serif !important;
        line-height: 1.5;
        letter-spacing: 0.0312rem !important; */
    }
</style>

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="{{ asset('images/logo-dark.png') }}" alt="" height="22" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Noza Cafe</p>

                    </div>
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form id="formAuthentication" method="POST" action="{{ url('auth/authorize') }}" class="mb-3">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Enter your email or username" autofocus>
                                    <span class="help-block text-danger" id="usernameErr" style="display: none;">
                                        Email / Username are Required
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="password" class="form-label">Password</label>
                                        <a href="{{ url('auth/forgot') }}">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button type="submit" id="loginBtn" class="btn btn-primary"> Log In </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark ms-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

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

    <script>
        // $("#formAuthentication").submit(
        //     async function(e) {
        //         e.preventDefault();

        //         const form = $(this);
        //         var username = $('#username').val();
        //         var password = $('#password').val();

        //         if (username != '' && password != '') {
        //             var submitBtnText = $('#submitBtn').html();
        //             const res = await submitApi("auth/authorize", form.serializeArray(), 'formAuthentication', null, false)
        //             if (isSuccess(res)) {
        //                 alert('submitted haha');
        //             } else {
        //                 alert(res.status)
        //             }
        //         } else {
        //             if (username == '' && password == '') {
        //                 noti(500, 'Please enter your password');
        //                 noti(500, 'Please enter your email/username');
        //             } else if (username == '') {
        //                 noti(500, 'Please enter your email/username');
        //             } else if (password == '') {
        //                 noti(500, 'Please enter your email/username');
        //             }
        //         }

        //     });

        $("#formAuthentication").submit(function(event) {
            event.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();

            if (username != '' && password != '') {
                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        "Authorization": `Bearer ${$('meta[name="csrf-token"]').attr('content')}`,
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: form.serialize(),
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#loginBtn").text('Being processed...');
                        $("#loginBtn").attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.response == 200) {
                            setTimeout(function() {
                                window.location.href = data.redirectUrl;
                            }, 5);
                        } else {
                            noti(500, data.message);
                        }
                    },
                    complete: function() {
                        $("#loginBtn").html('Log In <i class="fa fa-sign-in"></i>');
                        $("#loginBtn").attr('disabled', false);
                    }
                });
            } else {
                if (username == '' && password == '') {
                    noti(500, 'Please enter your email/username & password');
                } else if (username == '') {
                    noti(500, 'Please enter your email/username');
                } else if (password == '') {
                    noti(500, 'Please enter your password');
                }
            }
        });
    </script>

</body>

</html>