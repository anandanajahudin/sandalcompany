@extends('layouts.back.main')

@section('title', 'Employee Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Employee Edit</h5>

                    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" class="form-control" name="nip" value="{{ $employee->nip }}" readonly>

                            @error('nip')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $employee->nama }}"
                                required>

                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" name="department" id="department">
                                @if ($employee->department_id == null)
                                    <option selected disabled>Pilih bidang...</option>
                                @else
                                    <option value="{{ $employee->department_id }}" selected>
                                        {{ $employee->department->nama }}
                                    </option>
                                @endif

                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->nama }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="telp" class="form-label">Telp</label>
                            <input type="number" class="form-control" name="telp" value="{{ $employee->telp }}"
                                required>

                            @error('telp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $employee->alamat }}"
                                required>

                            @error('alamat')
                                <div class="alert alert-danger mt-2">
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
