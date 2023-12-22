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
                    <h5 class="card-title fw-semibold mb-4">Employee Edit KTP Image</h5>

                    <form action="{{ route('employee.updateImage', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label>Gambar KTP</label>
                            <input type="file"
                                class="form-control border-primary @error('image') is-invalid @enderror"
                                name="image" id="image" placeholder="KTP Image">
                            <small class="text-warning">Max File Size under 1MB</small>
                            &nbsp;|&nbsp;<small>Only .jpg, .png, .jpeg, .svg, .webp File</small>

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('employee.index') }}" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
