<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                Testimoni
            </h2>
        </div>
    </div>

    <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
        <div class="owl-carousel">
            @foreach ($testimonials as $testimonial)
                <div class="item">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('front/dist/images/profile/user-1.jpg') }}" alt=""
                                        class="w-auto me-3 rounded-circle" width="40" height="40">
                                    <div>
                                        <h6 class="fs-4 mb-1 fw-semibold">{{ $testimonial->nama }}</h6>
                                        {{-- <p class="mb-0 text-dark">Features avaibility</p> --}}
                                    </div>
                                </div>
                                <div>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                        <li>
                                            <a href="">
                                                <img src="{{ asset('front/dist/images/svgs/icon-star.svg') }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="{{ asset('front/dist/images/svgs/icon-star.svg') }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="{{ asset('front/dist/images/svgs/icon-star.svg') }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="{{ asset('front/dist/images/svgs/icon-star.svg') }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="{{ asset('front/dist/images/svgs/icon-star.svg') }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="fs-4 mb-0 text-dark">
                                {{ $testimonial->testimoni }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
