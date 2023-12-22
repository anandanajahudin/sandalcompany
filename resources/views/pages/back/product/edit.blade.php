@extends('layouts.back.main')

@section('title', 'Product Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Product Edit</h5>

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="namaproduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                name="namaproduk" value="{{ $product->nama_produk }}" required>

                            @error('nama_produk')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="kodeproduk" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control @error('kode_produk') is-invalid @enderror"
                                name="kodeproduk" value="{{ $product->kode_produk }}" required>

                            @error('kode_produk')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select @error('category') is-invalid @enderror" name="category"
                                id="category" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="hargapokok" class="form-label @error('hargapokok') is-invalid @enderror">Harga
                                Pokok</label>
                            <input type="number" class="form-control" name="hargapokok" value="{{ $product->harga_pokok }}"
                                required>

                            @error('hargapokok')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="hargajual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control @error('hargajual') is-invalid @enderror"
                                name="hargajual" value="{{ $product->harga_jual }}" required>

                            @error('hargajual')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                name="deskripsi" value="{{ $product->description }}">

                            @error('deskripsi')
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
