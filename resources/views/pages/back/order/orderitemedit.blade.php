@extends('layouts.back.main')

@section('title', 'Order Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Order Edit</h5>
                    <form action="{{ route('orderitem.update', ['id' => $order->id, 'itemid' => $item->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="product_id" class="form-label">Product</label>
                            <select class="form-select" name="product_id" id="product_id" required>
                                <option selected disabled>Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id ==  $item->product_id ? 'selected' : '' }} >{{ $product->nama_produk }}</option>
                                @endforeach
                            </select>

                            @error('product_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="itemstatus" class="form-label">Status</label>
                            <select class="form-select" name="itemstatus" id="itemstatus">
                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>
                                        Diproses
                                    </option>
                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>
                                        Dikirim
                                    </option>
                                    <option value="2" {{ $item->status == 2 ? 'selected' : '' }} >
                                        Selesai
                                    </option>
                            </select>

                            @error('customer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mb-2">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" required>

                            @error('quantity')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
