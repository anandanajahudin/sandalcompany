@extends('layouts.back.main')

@section('title', 'Department')

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
                    <h5 class="card-title fw-semibold mb-4">Department</h5>
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
                                        <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $department->nama }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $department->deskripsi }}
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('department.edit', $department->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>

                                                <form action="{{ route('department.destroy', $department->id) }}"
                                                    method="POST"
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

    @include('pages.back.department.create')
@endsection
