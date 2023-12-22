<div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header p-4">
        <h1>Company</h1>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item mt-3">
                <a class="nav-link fs-3 text-dark active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item mt-3 dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Katalog Sandal
                    <i class="ti ti-chevron-down fs-14"></i></a>
                <div class="dropdown-menu mt-3 ps-1">
                    <!-- apps -->
                    <div class="row">
                        <div class="col-12">
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
                                        {{-- <span class="fs-2 d-block fw-normal text-muted">New
                                            messages arrived</span> --}}
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
                                        {{-- <span class="fs-2 d-block fw-normal text-muted">Get
                                            latest invoice</span> --}}
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
                                        {{-- <span class="fs-2 d-block fw-normal text-muted">2
                                            Unsaved Contacts</span> --}}
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
                                        {{-- <span class="fs-2 d-block fw-normal text-muted">Get
                                            new emails</span> --}}
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
                                        {{-- <span class="fs-2 d-block fw-normal text-muted">Get
                                            new emails</span> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link fs-3 text-dark" href="#">Tentang</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link fs-3 text-dark" href="#">Hubungi</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li class="nav-item mt-3 dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nama }}
                            <i class="ti ti-chevron-down fs-14"></i></a>
                        <div class="dropdown-menu mt-3 ps-1">
                            <!-- apps -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="position-relative">
                                        <a target="_blank" href="#"
                                            class="d-flex align-items-center pb-7 position-relative lh-base">
                                            <div
                                                class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('/front/dist/images/svgs/icon-dd-chat.svg') }}"
                                                    alt="" class="img-fluid" width="24" height="24">
                                            </div>
                                            <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold text-hover-primary">Dashboard</h6>
                                            </div>
                                        </a>
                                        <form class="d-flex align-items-center pb-7 position-relative lh-base"
                                            role="search">
                                            <a href="#"
                                                class="btn btn-outline-primary d-block scroll-link">Logout</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-100 py-2">Member</a>

                    {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary w-100 py-2">Register</a>
                @endif --}}
                @endauth
            @endif
        </ul>
    </div>
</div>
