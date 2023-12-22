<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />

    <title>{{ config('app.name', 'Melly') }}</title>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/front/dist/images/logos/favicon-mely.webp') }}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('back/dist/css/style.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('back/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('back/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="{{ asset('back/dist/images/backgrounds/maintenance.svg') }}" alt="" class="img-fluid"
                                width="500">
                            <h1 class="fw-semibold my-7 fs-9">@yield('title')</h1>
                            <h4 class="fw-semibold mb-7">@yield('meesage')</h4>
                            <a class="btn btn-primary" href="{{ route('frontend') }}" role="button">Go Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('back/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('back/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('back/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('back/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('back/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('back/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('back/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('back/dist/js/custom.js') }}"></script>
</body>

</html>
