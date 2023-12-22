@extends('layouts.back.main')

@section('title', 'Product Detail')

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
                    <h5 class="card-title fw-semibold mb-4">Product Detail</h5>

                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Gambar</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <img src="{{ $product->image_path }}" alt="{{ $product->image_path }}" class="img-fluid"
                                style="max-height: 100px;">
                            <a href="{{ $product->image_path }}" class="btn btn-secondary">Lihat gambar</a>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Nama Produk</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $product->nama_produk }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Kategori</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $product->category->nama_kategori }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Harga Pokok</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            Rp {{ $product->harga_pokok }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Harga Jual</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            Rp {{ $product->harga_jual }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Deskripsi</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $product->deskripsi }}
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                @hasAnyRole(['employee'])
                                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">
                                        <i class="ti ti-arrow-left"></i> Back
                                    </a>

                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti ti-pencil"></i> Edit
                                    </a>

                                    <a href="{{ route('product.editImage', $product->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti ti-pencil"></i> Edit Image
                                    </a>

                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin menghapus ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="ti ti-trash"></i> Delete
                                        </button>
                                    </form>
                                @endHasAnyRole
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
