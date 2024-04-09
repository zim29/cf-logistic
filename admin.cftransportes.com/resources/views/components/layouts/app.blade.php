<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CF Logistics </title>
    
    <!-- Favicon -->
    <link rel="icon" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-32x32.png" sizes="32x32">
    <link rel="icon" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-180x180.png">
    <meta name="msapplication-TileImage" content="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-270x270.png">
    
    <!-- Choices JS -->
    <script src="{{ asset( 'assets/libs/choices.js/public/assets/scripts/choices.min.js' ) }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset( 'assets/js/main.js' ) }}"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset( 'assets/libs/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset( 'assets/css/styles.min.css' ) }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset( 'assets/css/icons.css' ) }}" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="{{ asset( 'assets/libs/node-waves/waves.min.css' ) }}" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="{{ asset( 'assets/libs/simplebar/simplebar.min.css' ) }}" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset( 'assets/libs/flatpickr/flatpickr.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'assets/libs/@simonwep/pickr/themes/nano.min.css' ) }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset( 'assets/libs/choices.js/public/assets/styles/choices.min.css' ) }}">


</head>

<body>

    <div class="page">
        @include('components.layouts.include.header')
        @include('components.layouts.include.sidenav')

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
        <!-- End::app-content -->

        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-semibold">CF Logistics</a>.
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->

    </div>

    
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    @livewire('Alert');

    <!-- Popper JS -->
    <script src="{{ asset( 'assets/libs/@popperjs/core/umd/popper.min.js' ) }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset( 'assets/libs/bootstrap/js/bootstrap.bundle.min.js' ) }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset( 'assets/js/defaultmenu.min.js' ) }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset( 'assets/libs/node-waves/waves.min.js' ) }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset( 'assets/js/sticky.js' ) }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset( 'assets/libs/simplebar/simplebar.min.js' ) }}"></script>
    <script src="{{ asset( 'assets/js/simplebar.js' ) }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset( 'assets/libs/@simonwep/pickr/pickr.es5.min.js' ) }}"></script>


    <!-- Apex Charts JS -->
    <script src="{{ asset( 'assets/libs/apexcharts/apexcharts.min.js' ) }}"></script>
    @livewireScripts 

</body>

</html>