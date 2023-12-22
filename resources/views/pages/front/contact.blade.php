@extends('layouts.front.main')

@section('title', 'Hubungi Kami')

@section('front')
    {{-- Hero --}}
    <section class="hero-section pb-6 pb-md-8"
        style="background: linear-gradient(225deg, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);">
        <div class="container pb-8 pt-5">
            <h1 class="text-white text-center"><b>Hubungi Kami</b></h1>
        </div>
    </section>

    {{-- Review --}}
    <section class="review-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-primary mb-3"><b>Halo! Mari berbicara dengan kami</b></h2>

                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label><b>Nama</b></label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label><b>Subjek</b></label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subjek" value="{{ old('subject') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label><b>Pesan</b></label>
                                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Pesan"
                                        value="{{ old('message') }}" required></textarea>
                                </div>

                                <button class="btn btn-primary btn-block">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-primary">
                                <b>Contact Us?</b>
                            </h2>
                            <p>
                                <b>Instagram: </b>
                                <a href="#">@company</a>
                            </p>
                            <p>
                                <b>Facebook: </b>
                                <a href="#">Company</a>
                            </p>
                            <p>
                                <b>Whatsapp: </b>
                                <a href="#">0811 2222 3333</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Banner --}}
    <section class="bg-primary pt-5 pt-xl-9 pb-8">
        <div class="container">
            <div class="row justify-content-between px-5">
                <div class="col-lg-7 col-xl-5 pt-lg-1 mb-1">
                    <h1 class="fs-12 text-white text-center text-lg-start fw-bolder mb-8">
                        Looking for More Product? Let's see our catalog
                    </h1>
                </div>
                <div class="col-lg-5 col-xl-5">
                    <div class="text-center text-lg-end">
                        <a href="#" class="btn bg-white text-primary fw-semibold mb-3 mb-sm-0 btn-hover-shadow">
                            Lihat Semua Catalog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
