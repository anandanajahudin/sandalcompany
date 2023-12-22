@extends('layouts.back.main')

@section('title', 'Product Category Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Product Category Edit</h5>

                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="kode_kategori" class="form-label">Category Code</label>
                            <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror"
                                name="kode_kategori" value="{{ $category->kode_kategori }}" required>

                            @error('kode_kategori')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama_kategori" class="form-label">Category Name</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                name="nama_kategori" value="{{ $category->nama_kategori }}" required>

                            @error('nama_kategori')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
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
