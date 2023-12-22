@extends('layouts.back.main')

@section('title', 'Order Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Order Edit</h5>

                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-select" name="customer" id="customer">
                                @if ($order->customer_id == null)
                                    <option selected disabled>Pilih customer...</option>
                                @else
                                    <option value="{{ $order->customer_id }}" selected>
                                        {{ $order->customer->nama }}
                                    </option>
                                @endif

                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                @endforeach
                            </select>

                            @error('customer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        @if (Auth::user()->nama == 'Admin')
                            <div class="form-group mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>
                                        Diproses
                                    </option>
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>
                                        Dikirim
                                    </option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>

                                @error('customer')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @auth
                                <input type="hidden" name="status" value="{{ $order->status }}">
                            @endauth
                        @endif
                        <input type="hidden" name ="employee" value="{{ Auth::id() }}">

                        <div class="form-group mb-2">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
