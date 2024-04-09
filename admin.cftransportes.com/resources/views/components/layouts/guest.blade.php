<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CF Logistics </title>

    <!-- Favicon -->
    <link rel="icon" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-32x32.png" sizes="32x32">
    <link rel="icon" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-180x180.png">
    <meta name="msapplication-TileImage" content="https://cftransportes.com/sitepad-data/uploads/2024/03/cropped-PERFIL-270x270.png">


    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" >

    <style>
        body {
            background-image: url('https://cftransportes.com/sitepad-data/uploads/2024/03/logistica.jpg');
            background-size: cover;
        }

        .logo {
            height: 5rem !important;
            animation: moveAndFade 4s forwards;
        }
        .container {
            animation: show 2s forwards;
        }

        @keyframes moveAndFade {
            0% {
                opacity: 0;
                transform: translateX(100%) rotate(45deg);
                
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 1;
                transform: translateX(0) rotate(0deg); 
            }
        }

        @keyframes show {
            0% {
                opacity: 0;
                transform: translatey(100%);
                
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 1;
                transform: translateX(0); 
            }
        }

    </style>

</head>

<body>

    <div class="container">
        {{ $slot }}
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts 

</body>

</html>