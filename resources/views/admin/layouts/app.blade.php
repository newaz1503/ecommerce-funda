<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{"asset('assets/admin')"}}/images/favicon.png">
    <title>@yield('title')</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/admin')}}/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/admin')}}/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/admin/dist')}}/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('assets/admin/dist')}}/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    @stack('css')
</head>

<body class="skin-default-dark fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>


    <div id="main-wrapper">

        @include('admin.layouts.header')

        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>


       @include('admin.layouts.footer')

    </div>

    <script src="{{asset('assets/admin')}}/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets/admin')}}/node_modules/popper/popper.min.js"></script>
    <script src="{{asset('assets/admin')}}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->

    <script src="{{asset('assets/admin/dist')}}/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/admin/dist')}}/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/admin/dist')}}/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/admin/dist')}}/js/custom.min.js"></script>

    <script src="{{asset('assets/admin')}}/node_modules/raphael/raphael-min.js"></script>
    <script src="{{asset('assets/admin')}}/node_modules/morrisjs/morris.min.js"></script>
    <script src="{{asset('assets/admin')}}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <script src="{{asset('assets/admin/dist')}}/js/dashboard1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
    @stack('script')

</body>

</html>
