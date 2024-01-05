@extends('layouts.back.main')

@section('title', 'Testimonial Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Testimonial Edit</h5>

                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="order" class="form-label">Order</label>
                            <select class="form-select" name="order" id="order" required>
                                @if ($testimonial->order_id == null)
                                    <option selected disabled>Pilih order...</option>
                                @else
                                    <option value="{{ $testimonial->order->id }}" selected>
                                        ORD-{{ $testimonial->order->id }}
                                    </option>
                                @endif

                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">ORD-{{ $order->id }}</option>
                                @endforeach
                            </select>

                            @error('order')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ $testimonial->nama }}" required>

                            @error('nama')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="nilai" class="form-label">Nilai</label>
                            <select class="form-select" name="nilai" id="nilai" required>
                                @if ($testimonial->nilai == null)
                                    <option selected disabled>Pilih nilai...</option>
                                @else
                                    <option value="{{ $testimonial->nilai }}" selected>
                                        {{ $testimonial->nilai }}
                                    </option>
                                @endif
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>

                            @error('nilai')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="testimoni" class="form-label">Testimoni</label>
                            <input type="text" class="form-control @error('testimoni') is-invalid @enderror"
                                name="testimoni" value="{{ $testimonial->testimoni }}" required>

                            @error('testimoni')
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
