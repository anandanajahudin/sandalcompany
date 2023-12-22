<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            <div class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7">
            </div>
            <h2 class="fs-9 text-center mb-lg-6 fw-bolder">Produk Terbaik Kami</h2>
        </div>
    </div>
    <div class="domo-contect position-relative">
        <div class="demos-view mt-4">
            <div class="text-center">
                <small class="text-primary fw-bold mb-2 d-block fs-3">Produk terbaik spesial buat kamu</small>
                <a href="#" class="btn btn-primary text-center mb-8 fs-4 py-6 px-4 rounded-pill">
                    Best Seller</a>
                <a href="{{ route('catalog') }}"
                    class="btn btn-outline-secondary text-center mb-8 fs-4 py-6 px-4 rounded-pill">
                    All Products</a>
            </div>
        </div>
    </div>
    <div class="row el-element-overlay mt-4">
        @foreach ($bestseller as $seller)
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="card overflow-hidden">
                    <div class="el-card-item pb-3">
                        <div
                            class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                            @if ($seller->image_path != null)
                                <img src="{{ asset('/' . $seller->image_path) }}"
                                    class="d-block position-relative w-100" alt="user Photo">
                            @else
                                <img src="{{ asset('/front/dist/images/produk/no-image-color.png') }}"
                                    class="d-block position-relative w-100" alt="user Photo">
                            @endif
                            <div class="el-overlay w-100 overflow-hidden">
                                <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        @if ($seller->image_path != null)
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                                href="{{ asset('/' . $seller->image_path) }}"><i
                                                    class="ti ti-search"></i></a>
                                        @else
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                                href="{{ asset('/front/dist/images/produk/no-image-color.png') }}"><i
                                                    class="ti ti-search"></i></a>
                                        @endif

                                    </li>
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline el-link text-white border-white"
                                            href="javascript:void(0);"><i class="ti ti-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content text-center">
                            <h4 class="mb-0 fs-5">{{ $seller->nama_produk }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
