<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> Sign In </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ $ins_name }}" name="description" />
    <meta content="{{ $ins_name }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}{{ $icon }}">

    <!-- Layout config Js -->
    <script src="{{asset('/')}}public/admin/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}public/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/')}}public/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}public/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('/')}}public/admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <style>

        .swal2-confirm{

            margin-left:10px;
        }

   </style>
   <style>

    .parsley-required{

        margin-top:10px;
    }

    .box

    {

     width:100%;

     max-width:600px;

     background-color:#f9f9f9;

     border:1px solid #ccc;

     border-radius:5px;

     padding:16px;

     margin:0 auto;

    }

    input.parsley-success,

    select.parsley-success,

    textarea.parsley-success {

      color: #468847;

      background-color: #DFF0D8;

      border: 1px solid #D6E9C6;

    }

    input.parsley-error,

    select.parsley-error,

    textarea.parsley-error {

      color: #B94A48;

      background-color: #F2DEDE;

      border: 1px solid #EED3D7;

    }


    .parsley-errors-list {

      margin: 2px 0 3px;

      padding: 0;

      list-style-type: none;

      font-size: 0.9em;

      line-height: 0.9em;

      opacity: 0;


      transition: all .3s ease-in;

      -o-transition: all .3s ease-in;

      -moz-transition: all .3s ease-in;

      -webkit-transition: all .3s ease-in;

    }


    .parsley-errors-list.filled {

      opacity: 1;

    }



    .error,.parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{

     color:#ff0000;

    }



    </style>

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="{{asset('/')}}{{ $logo }}" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">{{ $ins_name }}</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to {{ $ins_name }}.</p>
                                    @include('flash_message')
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('login.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                      @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                        </div>

                                        <div class="mb-3">
                                            {{-- <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div> --}}
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input" required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> --}}

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Sign In</button>
                                        </div>

                                        {{-- <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        {{-- <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div> --}}

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> {{ $ins_name }}.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('/')}}public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="{{asset('/')}}public/admin/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="{{asset('/')}}public/admin/assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="{{asset('/')}}public/admin/assets/js/pages/password-addon.init.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('/')}}public/admin/parsely1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</body>

</html>
