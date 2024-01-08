@extends('layouts.back.main')

@section('title', 'Employee')

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
                    <h5 class="card-title fw-semibold mb-4">Employee Detail</h5>

                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">NIP</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $employee->nip }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Nama</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $employee->user->nama }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Bidang</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $employee->department->nama }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Telp</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $employee->user->telp }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Alamat</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            {{ $employee->user->alamat }}
                        </div>

                        <div class="col-lg-3 mb-3">
                            <h6 class="fw-semibold mb-0">Gambar KTP</h6>
                        </div>
                        <div class="col-lg-9 mb-3">
                            @if ($employee->image != null)
                                <a href="{{ asset('assets/images/employees/'. $employee->image) }}" target="_blank">
                                    <img src="{{ asset('assets/images/employees/' . $employee->image) }}"
                                    class="img-fluid" width="100">
                                </a>
                            @endif
                        </div>

                        <div class="col-lg-12">
                            <hr>
                            <a href="{{ route('employee.index') }}"
                                class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Back
                            </a>

                            <a href="{{ route('employee.edit', $employee->id) }}"
                                class="btn btn-warning">
                                <i class="ti ti-pencil"></i> Edit
                            </a>

                            @if ($employee->image == null)
                                <a href="{{ route('employee.editImage', $employee->id) }}"
                                    class="btn btn-secondary">
                                    <i class="ti ti-pencil"></i> Upload KTP Image
                                </a>
                            @else
                                <a href="{{ route('employee.editImage', $employee->id) }}"
                                    class="btn btn-warning">
                                    <i class="ti ti-pencil"></i> Edit KTP Image
                                </a>
                            @endif
                            <p>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin menghapus ini?');"
                                    class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                </form>

                                @if ($employee->image != null)
                                    <form action="{{ route('employee.destroyImage', $employee->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin menghapus ini?');"
                                        class="form-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="ti ti-trash"></i> Delete KTP
                                        </button>
                                    </form>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
