@extends('layouts.back.main')

@section('title', 'Testimoni')

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
                    <h5 class="card-title fw-semibold mb-4">Testimoni</h5>
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
                                        <h6 class="fw-semibold mb-0">Order</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nilai</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Testimoni</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('order.show', $testimonial->order_id) }}">
                                                ORD-{{ $testimonial->order_id }}
                                            </a>
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $testimonial->nama }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $testimonial->nilai }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $testimonial->testimoni }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">

                                                @hasAnyRole(['employee'])
                                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>

                                                    <form action="{{ route('testimonial.destroy', $testimonial->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin menghapus ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
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

    @include('pages.back.testimonial.create')

@endsection
