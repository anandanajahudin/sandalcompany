@extends('layouts.front.main')

@section('title', 'Tentang Kami')

@section('front')
    {{-- Hero --}}
    <section class="hero-section pb-6 pb-md-8"
        style="background: linear-gradient(225deg, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);">
        <div class="container pb-8 pt-5">
            <h1 class="text-white text-center"><b>Tentang Kami</b></h1>
        </div>
    </section>

    {{-- Review --}}
    <section class="review-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <h2 class="text-primary"><b>Tentang kami</b></h2>
                                <p class="lh-lg">
                                    Kami adalah perusahaan yang bergerak
                                    di bidang industrial produksi alas kaki,
                                    dengan pelayanan yang cepat, produk berkualitas, dan terpercaya.
                                </p>

                                <h2 class="text-primary"><b>Mengapa memilih kami?</b></h2>
                                <ul class="lh-lg">
                                    <p>
                                        <li><b>Terpercaya</b></li>
                                        Kami telah melayani banyak perusahaan sejak tahun 2010 dan masih menjalin
                                        kerjasama yang berkesinambungan hingga saat ini.
                                    </p>
                                    <p>
                                        <li><b>Bersahabat</b></li>
                                        Selalu lebih dekat dengan klien, serta memiliki harga
                                        yang sangat bersahabat adalah visi kami, sehingga
                                        klien kami memiliki kenyamanan dan harga yang bersaing
                                        dengan produk lebih yang berkualitas.
                                    </p>
                                    <p>
                                        <li><b>Inovatif</b></li>
                                        Produk baru selalu menjadi terobosan utama kami dalam berinovasi,
                                        sehingga produk kami selalu mengikuti perkembangan zaman,
                                        serta kebutuhan klien.
                                    </p>
                                    <p>
                                        <li><b>Solutif</b></li>
                                        Apapun kendala klien kami mengenai alas kaki,
                                        kami dapat menyelesaikan dengan memberikan kenyamanan
                                        dan tampilan yang fashionable mengikuti tren.
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-primary">
                                <b>Kontak</b>
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
