<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>LaraElegant Admin Panel - The Ultimate admin Panel</title>
    
    <!-- chart Morris CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!--c3 plugins CSS -->
    <!-- <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet"> -->

    <!-- app CSS -->
    <link href="{{ asset('_admin/css/app.css') }}" rel="stylesheet">
    <!-- toastr css -->
    <link rel="stylesheet" href="{{ asset('_admin/css/toastr.min.css') }}">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    {{-- calendar --}}
    <link rel="stylesheet" href="{{ asset('_admin/Calendar/calendar.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
    
    

</head>

<body class="skin-default-dark fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">LaraElegant admin</p>
        </div>
    </div>

    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.partials.topbar')
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.partials.left-sidebar')
        <!-- right Sidebar - style you can find in right-sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.partials.right-sidebar')


        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 580px; !important">

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->


        <footer class="footer">
             © 2018 Elegent Admin by wrappixel.com 
        </footer>
    </div>


    <script src="{{ asset('_admin/js/app.js') }}"></script>
    <script src="{{ asset('_admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('_admin/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('_admin/js/toastr.min.js') }}"></script>
    
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{-- morrisjs charts --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    @yield('scripts')
    <script>
        $(document).ready(function() {
            $('.prevent_link').click(function(e) {
                e.preventDefault();
                alert('You clicked the link.');
            });
        });

        var toggleBtn = document.querySelector('.sidebar-toggle');
        var sidebar = document.querySelector('.right-sidebare');
        toggleBtn.addEventListener('click', function() {
            toggleBtn.classList.toggle('is-closed');
            sidebar.classList.toggle('is-closed');
        })
    </script>


    <!-- slimscrollbar scrollbar JavaScript -->
    <!-- <script src="dist/js/perfect-scrollbar.jquery.min.js"></script> -->
    <!--Wave Effects -->
    <!-- <script src="dist/js/waves.js"></script> -->
    {{-- Menu sidebar --}}
    {{-- <script src="dist/js/sidebarmenu.js"></script>  --}}
    <!--Custom JavaScript -->
    <!-- <script src="dist/js/custom.min.js"></script> -->
    <!-- ============================================================== -->

    <!-- <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="../assets/node_modules/d3/d3.min.js"></script>
        <script src="../assets/node_modules/c3-master/c3.min.js"></script>

        <script src="dist/js/dashboard1.js"></script> -->
</body>

</html>
