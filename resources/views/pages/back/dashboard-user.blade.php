@extends('layouts.back.main')

@section('title', 'Dashboard')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Dashboard</h5>
    <!-- Produk -->
    <div class="col-lg-3">
        <div class="card border-success">
            <a href="{{ route('product.index') }}">
                <div class="card-header bg-success text-white">Product</div>
            </a>
            <div class="card-body">
                <div class="row alig n-items-start">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-3">{{ $products }} products</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order -->
    <div class="col-lg-3">
        <div class="card border-danger">
            <a href="{{ route('order.index') }}">
                <div class="card-header bg-danger text-white">Order</div>
            </a>
            <div class="card-body">
                <div class="row alig n-items-start">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-3">{{ $orders }} order</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
