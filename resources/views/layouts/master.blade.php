<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('templates/images/favicon.png') }}">
    <title> Book-U - Library Management System </title>
    <link href="{{ url('templates/css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('templates/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"  data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('layouts/partials/navbar')

        @include('layouts/partials/sidebar')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">@yield('title')</h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>

            @include('layouts/partials/footer')
        </div>
    </div>

    <script src="{{ url('templates/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('templates/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('templates/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ url('templates/js/app-style-switcher.js') }}"></script>
    <script src="{{ url('templates/js/feather.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('templates/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ url('templates/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ url('templates/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('templates/js/custom.min.js') }}"></script>

    <script src="{{ url('templates/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('templates/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('jsLibrary')

    @yield('jsFunctions')
</body>
</html>