<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/css/classic-vertical/fonts.css">
    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/css/classic-vertical/style.css">

    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/vendors/font-awesome/css/font-awesome.min.css" />

    <!-- plugins:js -->
    <script src="<?php echo url(''); ?>/admin_assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo url(''); ?>/admin_assets/js/off-canvas.js"></script>
    <script src="<?php echo url(''); ?>/admin_assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo url(''); ?>/admin_assets/js/misc.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/css/custom.css" />

    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/css/dark.css" />

    <style>
        .container-scroller {
            min-height: 100vh !important;
        }

        .error {
            color: red;
        }

    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.left')
        <div class="container-fluid page-body-wrapper">
            @include('admin.header')

            <div class="main-panel">
                <div class="content-wrapper">
                    @section('content')

                    @show
                </div>

                @include('admin.footer')

            </div>
        </div>
    </div>
</body>

</html>
