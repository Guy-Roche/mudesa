<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>MUDESA | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

        <!-- App css -->
        @include('layouts.admin.style')

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page --> 
        <div id="app-layout">


            <!-- Topbar Start -->
                @include('layouts.admin.topbar')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
                @include('layouts.admin.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    @yield('content')
                    <!-- container-fluid -->
                    
                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layouts.admin.footer')
                <!-- end Footer -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
            @include('layouts.admin.js')

    </body>
</html>