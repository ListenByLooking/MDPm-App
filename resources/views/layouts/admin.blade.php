<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>@yield('title','Multimedia Artworks')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Multimedia Artworks" name="author" />
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}
 
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/dataTables.dataTables.min.css') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

   
    
    <link href="{{ asset('public/css/select2.min.css') }}" rel="stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

       @include('layouts.sections.header')


        <!-- ========== App Menu ========== -->
        @include('layouts.sections.sidebar')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            @include('layouts.sections.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT --> 
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>  
    <script src="{{ asset('public/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/js/ckeditor.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script> 
    <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.min.js') }}"></script>
    @yield('script')
</body>
</html>