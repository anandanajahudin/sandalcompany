<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>Company</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('srs-dummylogo.png') }}" />
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('/front/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/dist/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/dist/libs/magnific-popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/dist/css/style.css') }}">
    @stack('styles')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">

        {{-- header start --}}
        @include('layouts.front.components.navbar')
        @include('layouts.front.components.navbar-mobile2')
        {{-- header end --}}

        {{-- body content start --}}
        <div class="body-wrapper overflow-hidden">
            @yield('front')
        </div>
        {{-- body content end --}}

        @include('layouts.front.components.footer')
    </div>

    <script src="{{ asset('/front/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/front/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('/front/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/front/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/front/dist/js/custom.js') }}"></script>
    <script src="{{ asset('/front/dist/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/front/dist/libs/magnific-popup/dist/meg.init.js') }}"></script>
    <script src="{{ asset('back/dist/js/notify/notify.min.js') }}"></script>

    @stack('scripts')
    @include('layouts.flash')


</body>

</html>
