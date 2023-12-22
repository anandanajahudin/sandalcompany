@extends('layouts.front.main')

@section('title', 'Katalog Produk')

@section('front')

    {{-- Hero --}}
    <section class="hero-section pb-6 pb-md-8"
        style="background: linear-gradient(225deg, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);">
        <div class="container pb-8 pt-5">
            <h1 class="text-white text-center"><b>Produk Kami</b></h1>
        </div>
    </section>

    {{-- Production --}}
    <section class="bg-light production pt-5 pt-lg-8 pt-xl-10 pb-8 pb-md-10" id="production-template">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7">
                    </div>
                    <h2 class="text-center mb-0 fs-9 fw-bolder">All Products</h2>
                </div>
            </div>
            <div class="row el-element-overlay mt-4">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 pb-3">
                        <div class="card overflow-hidden">
                            <div class="el-card-item pb-3">
                                <div
                                    class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                                    @if ($product->image_path != null)
                                        <img src="{{ asset('/' . $product->image_path) }}"
                                            class="d-block position-relative w-100" alt="user Photo">
                                    @else
                                        <img src="{{ asset('/front/dist/images/produk/no-image-color.png') }}"
                                            class="d-block position-relative w-100" alt="user Photo">
                                    @endif
                                    <div class="el-overlay w-100 overflow-hidden">
                                        <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                            <li class="el-item d-inline-block my-0 mx-1">
                                                @if ($product->image_path != null)
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                                        href="{{ asset('/' . $product->image_path) }}"><i
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
                                    <h4 class="mb-0 fs-5">{{ $product->nama_produk }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Answer --}}
    <section class="pt-8 pt-md-5 pb-5 pb-lg-10 pb-xl-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card c2a-box" data-aos="fade-up" data-aos-delay="1600" data-aos-duration="1000">
                        <div class="card-body text-center p-4 pt-8">
                            <h3 class="fs-7 fw-semibold pt-6">
                                Have an order or request for other products?
                            </h3>
                            <p class="mb-8 px-5 text-dark">
                                Log in as member account and find the product you want.
                                Or you can ask your questions at contact us.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                                <a href="#" target="_blank"
                                    class="btn btn-primary d-block mb-3 mb-sm-0 btn-hover-shadow" type="button">
                                    Member</a>
                                <a href="#" target="_blank" class="btn btn-outline-secondary d-block"
                                    type="button">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
