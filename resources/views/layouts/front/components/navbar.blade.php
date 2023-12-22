<header class="header">
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
            <a class="navbar-brand me-0 py-0" href="{{ route('frontend') }}">
                <img src="{{ asset('/srs-dummylogo.png') }}" alt="img-fluid">
            </a>
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('catalog') }}">Produk</a>
                    </li>
                    {{-- <li class="nav-item dropdown hover-dd pages-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> Katalog Sandal <span class="d-flex align-items-center">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animate-up py-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <div class="position-relative">
                                            <a target="_blank" href="#"
                                                class="d-flex align-items-center pb-7 position-relative lh-base">
                                                <div
                                                    class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('/front/dist/images/svgs/icon-dd-chat.svg') }}"
                                                        alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Basic</h6>
                                                </div>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="d-flex align-items-center pb-7 position-relative lh-base">
                                                <div
                                                    class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('/front/dist/images/svgs/icon-dd-invoice.svg') }}"
                                                        alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1 fw-semibold text-hover-primary">2014</h6>
                                                </div>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="d-flex align-items-center pb-7 position-relative lh-base">
                                                <div
                                                    class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('/front/dist/images/svgs/icon-dd-mobile.svg') }}"
                                                        alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1 fw-semibold text-hover-primary">2016</h6>
                                                </div>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="d-flex align-items-center pb-7 position-relative lh-base">
                                                <div
                                                    class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('/front/dist/images/svgs/icon-dd-message-box.svg') }}"
                                                        alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1 fw-semibold text-hover-primary">2017</h6>
                                                </div>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="d-flex align-items-center pb-7 position-relative lh-base">
                                                <div
                                                    class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('/front/dist/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                        alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1 fw-semibold text-hover-primary">2018</h6>
                                                    <span class="fs-2 d-block fw-normal text-muted">Get
                                                        new emails</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">Hubungi</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown hover-dd pages-dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"> {{ Auth::user()->nama }} <span class="d-flex align-items-center">
                                        <i class="ti ti-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animate-up py-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="p-2">
                                                <div class="position-relative">
                                                    <a href="{{ route('dashboard') }}"
                                                        class="d-flex align-items-center pb-7 position-relative lh-base">
                                                        <div
                                                            class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('/front/dist/images/svgs/icon-dd-chat.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold text-hover-primary">Dashboard</h6>
                                                        </div>
                                                    </a>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <button type="submit"
                                                            class="btn btn-outline-primary d-block scroll-link">
                                                            {{ __('Log Out') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="nav-item ms-2">
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2">
                                    Member</a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2">Register</a>
                                @endif --}}
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
