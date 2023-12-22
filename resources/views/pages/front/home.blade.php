@extends('layouts.front.main')

@section('title', 'Home')

@section('front')

    {{-- Hero --}}
    <section class="hero-section" style="max-width: 100%;">
        @include('layouts.front.components.home.header')
    </section>

    {{-- Section kategori --}}
    <section class="features-section py-5">
        @include('layouts.front.components.home.features')
    </section>

    {{-- Production --}}
    <section class="bg-light production pt-5 pt-lg-8 pt-xl-10 pb-10 pb-md-12" id="production-template">
        @include('layouts.front.components.home.product')
    </section>

    {{-- Answer --}}
    <section class="bg-light pt-8 pt-md-5 pb-5 pb-lg-10 pb-xl-12">
        @include('layouts.front.components.home.answer')
    </section>

    {{-- Komentar --}}
    <section class="review-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
        @include('layouts.front.components.home.review')
    </section>

    {{-- Banner --}}
    <section class="bg-primary pt-5 pt-xl-9 pb-8">
        @include('layouts.front.components.home.bannerdown')
    </section>
@endsection
