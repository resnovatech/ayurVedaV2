<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}{{ $icon }}">

    <!-- jsvectormap css -->
    <link href="{{asset('/')}}public/admin/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{asset('/')}}public/admin/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />



    <!-- Layout config Js -->
    <script src="{{asset('/')}}public/admin/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}public/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Icons Css -->
    <link href="{{asset('/')}}public/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}public/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('/')}}public/admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
    
    
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

    <!-- Begin page -->
    <div id="layout-wrapper">

       @include('admin.include.header')

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        @include('admin.include.sidebar')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

           @yield('body')
            <!-- End Page-content -->

            @include('admin.include.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>





    <!-- JAVASCRIPT -->
    <script src="{{asset('/')}}public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="{{asset('/')}}public/admin/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{asset('/')}}public/admin/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{asset('/')}}public/admin/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{asset('/')}}public/admin/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- profile init js -->
    <script src="{{asset('/')}}public/admin/assets/js/pages/profile.init.js"></script>







    <!-- App js -->
    <script src="{{asset('/')}}public/admin/assets/js/app.js"></script>

    <script src="{{ asset('/')}}public/admin/parsely1.js"></script>


   <script>
 $(function(){
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
});
  </script>


@yield('script')


</body>

</html>
