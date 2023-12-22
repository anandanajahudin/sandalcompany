@extends('layouts.back.main')

@section('title', 'Customer Edit')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Customer Edit</h5>

                    <form action="{{ route('user.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" class="form-control" name="user_type" value="customer" readonly>

                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $customer->user->nama }}"
                                required>

                            @error('nama')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="phone" class="form-label">Telp</label>
                            <input type="number" class="form-control" name="telp" value="{{ $customer->user->telp }}"
                                required>

                            @error('telp')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota" value="{{ $customer->kota }}"
                                required>

                            @error('kota')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $customer->user->alamat }}"
                                required>

                            @error('alamat')
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

    @include('pages.back.customer.create')
@endsection
