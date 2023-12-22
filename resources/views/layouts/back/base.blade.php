<!DOCTYPE html>
<html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />

    <title>Company</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('srs-dummylogo.png') }}" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('back/dist/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" rel="stylesheet" href="{{ asset('back/dist/css/selectize.bootstrap5.css') }}" />

    @auth
        <link rel="stylesheet" type="text/css"
            href="{{ asset('back/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('back/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('back/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    @endauth

    {{-- Custom Styles --}}
    @yield('styles')
    {{-- End custom --}}
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @yield('content')

        {{-- Setelah Login --}}
        @auth
            <!-- page-wrapper Start       -->
            <!-- Page Body Start-->
            <aside class="left-sidebar">
                {{-- Sidebar Start --}}
                @include('layouts.back.components.sidebar')
                {{-- Sidebar End --}}
            </aside>

            <div class="body-wrapper">
                <!-- Container-fluid starts-->
                @include('layouts.back.components.header')

                <div class="container-fluid mw-100">
                    <div class="row">
                        @yield('isi')
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <div class="dark-transparent sidebartoggler"></div>
        @endauth
    </div>

    <!-- Import Js Files -->
    <script src="{{ asset('back/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('back/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('back/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('back/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('back/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('back/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('back/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('back/dist/js/custom.js') }}"></script>
    <script src="{{ asset('back/dist/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('back/dist/js/notify/notify.min.js') }}"></script>

    {{-- Setelah Login --}}
    @auth
        {{-- Sweet Alert --}}
        <script src="{{ asset('back/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('back/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

        {{-- Select2 dan Selectize --}}
        <script src="{{ asset('back/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('back/dist/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/forms/select2.init.js') }}"></script>
        <script src="{{ asset('back/dist/js/apps/selectize.min.js') }}"></script>

        {{-- Jquery --}}
        <script src="{{ asset('back/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/datatable.buttons.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/jszip.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/pdfmake.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/vfs_fonts.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/buttons.print.min.js') }}"></script>
        <script src="{{ asset('back/dist/js/datatable/datatable-advanced.init.js') }}"></script>
        <script type="text/javascript">
            $(".counter-carousel").owlCarousel({
                loop: true,
                margin: 30,
                mouseDrag: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                nav: false,
                rtl: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    1200: {
                        items: 5,
                    },
                    1400: {
                        items: 6,
                    },
                },
            });

            $(".collectibles-carousel").owlCarousel({
                loop: true,
                margin: 30,
                mouseDrag: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                nav: false,
                dots: false,
                rtl: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                },
            });
        </script>
    @endauth

    {{-- flash --}}
    @include('layouts.flash')

    @stack('script')


</body>

</html>
