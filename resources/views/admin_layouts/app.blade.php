<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="/admin_assets/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Materio - Bootstrap Material Design Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/admin_assets/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/admin_assets/assets/vendor/fonts/materialdesignicons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/admin_assets/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/admin_assets/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/admin_assets/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/admin_assets/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/admin_assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/admin_assets/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/admin_assets/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/admin_assets/assets/js/config.js"></script>

    <!-- Bootstrap CSS -->
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

    <style>
        td:first-child,
        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        td:last-child,
        th:last-child {
            border-radius: 0 10px 10px 0;
        }
    </style>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar -->
            @include('admin_layouts.partials.sidebar')
            <!-- End Sidebar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin_layouts.partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('admin_layouts.partials.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/admin_assets/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/admin_assets/assets/vendor/libs/popper/popper.js"></script>
    <script src="/admin_assets/assets/vendor/js/bootstrap.js"></script>
    <script src="/admin_assets/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/admin_assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/admin_assets/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/admin_assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/admin_assets/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/admin_assets/assets/js/dashboards-analytics.js"></script>
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
   <script>
    $(document).ready(function() {
        $('#example, #example1, #example2, #example3, #material-table, #poptable').DataTable({
            ordering: false
        });
    });
</script>

    
    

</body>

</html>
