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
                    <h5 class="card-title fw-semibold mb-4">Customer</h5>
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
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Telp</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kota</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Alamat</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $customer->nama }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $customer->telp }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $customer->kota }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $customer->alamat }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('user.show', $customer->id) }}"
                                                    class="btn btn-secondary btn-sm"><i class="ti ti-arrow-right"></i></a>

                                                <a href="{{ route('user.edit', $customer->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>

                                                <form action="{{ route('user.destroy', $customer->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin menghapus ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="ti ti-trash"></i></button>
                                                </form>
                                                {{-- <span class="badge bg-primary rounded-3 fw-semibold">Low</span> --}}
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

    @include('pages.back.customer.create')
@endsection
