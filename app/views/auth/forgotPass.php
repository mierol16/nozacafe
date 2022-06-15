<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ base_url }}public/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> {{ $title }} | {{ $_ENV['APP_NAME'] }} </title>
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <link rel="shortcut icon" href="{{ asset('framework/favicon.ico') }}" />
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
                            <img src="{{ asset('images/logosdtc.png') }}" alt="" width="100%" height="auto" class="mx-auto">
                        </a>
                        <h4 class="text-muted text-dark mt-2 mb-4">Noza Cafe</h4>

                    </div>
                    <div class="card">
                        <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h5 class="text-uppercase mt-0 mb-3">Reset Password</h5>
                            <p class="text-muted mb-0 font-13">Enter your email address.</p>
                        </div>

                        <form id="formPassEmail" action="auth/emailPass" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input class="form-control" type="email" id="user_email" name="user_email" required="" placeholder="Enter your email">
                            </div>

                            <div class="mb-3 text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Reset Password </button>
                            </div>

                        </form>   
                        
                        <form id="formResetPass" action="auth/resetPass" method="POST" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Retype Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="user_id" name="user_id">
                                <button class="btn btn-primary" type="submit">Reset Now !</button>
                            </div>
                        </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{ url('auth') }}" class="text-dark ms-1"><b>Log in</b></a></p>
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
        $("#formPassEmail").submit(function(event) {
      event.preventDefault();

      const form = $(this);
      const url = form.attr('action');

      cuteAlert({
        type: 'question',
        title: 'Are you sure?',
        message: 'Email will be sent!',
        closeStyle: 'circle',
        cancelText: 'Abort',
        confirmText: 'Yes, Confirm!',
      }).then(
        async (e) => {
          if (e == 'confirm') {
            const res = await submitApi(url, form.serializeArray(), 'formPassEmail');
            if (isSuccess(res)) {
              // document.getElementById("formPassEmail").reset();
              $('#user_id').val(res.data.user_id);
              $('#formPassEmail').hide();
              $('#formResetPass').show();
            }
          }
        }
      );
    });

    $("#formResetPass").submit(function(event) {
      event.preventDefault();
      var password = $('#user_password').val();
      var confirmPass = $('#confirm_password').val();

      const form = $(this);
      const url = form.attr('action');

      cuteAlert({
        type: 'question',
        title: 'Are you sure?',
        message: 'Password will be reset!',
        closeStyle: 'circle',
        cancelText: 'Abort',
        confirmText: 'Yes, Confirm!',
      }).then(
        async (e) => {
          if (e == 'confirm') {
            if (confirmPass != password) {
              noti(500, "Password doesn't match");
            } else {
              const res = await submitApi(url, form.serializeArray(), 'formResetPass');
              if (isSuccess(res)) {
                document.getElementById("formResetPass").reset();
                document.getElementById("formPassEmail").reset();
                // $('#formPassEmail').show();
                // $('#formResetPass').hide();
                window.location.href = "{{ url('auth') }}"
              }
            }
          }
        }
      );
    });
    </script>
</body>

</html>