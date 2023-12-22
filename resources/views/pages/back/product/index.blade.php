@extends('layouts.back.main')

@section('title', 'Products')

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
                    <h5 class="card-title fw-semibold mb-4">Products</h5>
                    <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah
                    </button>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="datatable">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No.</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Gambar</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama Produk</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Harga Pokok</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Harga Jual</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <img src="{{ $product->image_path }}" alt="{{ $product->image_path }}"
                                                class="img-fluid" style="max-height: 100px;">
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $product->nama_produk }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $product->category->nama_kategori }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $product->harga_pokok }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $product->harga_jual }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">

                                                @hasAnyRole(['employee'])
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="ti ti-arrow-right"></i>
                                                    </a>
                                                @endHasAnyRole
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.back.product.create')


@endsection
