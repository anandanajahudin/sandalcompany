@extends('layouts.back.main')

@section('title', 'Product Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Product Edit</h5>

                    <form action="{{ route('product.updateImage', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="namaproduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                name="namaproduk" value="{{ $product->nama_produk }}" readonly required>

                            @error('nama_produk')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control border-primary @error('image') is-invalid @enderror"
                                name="image" id="image" placeholder="Gambar Produk">
                            <small class="text-warning">Max File Size under 2MB</small>
                            &nbsp;|&nbsp;<small>Only .jpg, .png, .jpeg, .svg, .webp File</small>

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
