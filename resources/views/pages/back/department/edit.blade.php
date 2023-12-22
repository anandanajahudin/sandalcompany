@extends('layouts.back.main')

@section('title', 'Department Edit')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Department Edit</h5>

                    <form action="{{ route('department.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $department->nama }}"
                                required>

                            @error('nama')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" value="{{ $department->deskripsi }}"
                                required>

                            @error('deskripsi')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
