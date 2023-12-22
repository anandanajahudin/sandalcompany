@extends('layouts.back.main')

@section('title', 'Customer')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Customer Detail</h5>

                    <div class="row">
                        <div class="col-lg-2">
                            <h6 class="fw-semibold mb-0">Nama</h6>
                        </div>
                        <div class="col-lg-10">
                            {{ $customer->user->nama }}
                        </div>

                        <div class="col-lg-2">
                            <h6 class="fw-semibold mb-0">Telp</h6>
                        </div>
                        <div class="col-lg-10">
                            {{ $customer->user->telp }}
                        </div>

                        <div class="col-lg-2">
                            <h6 class="fw-semibold mb-0">Kota</h6>
                        </div>
                        <div class="col-lg-10">
                            {{ $customer->kota }}
                        </div>

                        <div class="col-lg-2">
                            <h6 class="fw-semibold mb-0">Alamat</h6>
                        </div>
                        <div class="col-lg-10">
                            {{ $customer->user->alamat }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
