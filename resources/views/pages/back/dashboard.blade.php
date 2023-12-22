@extends('layouts.back.main')

@section('title', 'Dashboard')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Dashboard</h5>

    <div class="row">
        <!-- Pegawai -->
        <div class="col-lg-3">
            <div class="card border-secondary">
                <a href="{{ route('employee.index') }}">
                    <div class="card-header bg-secondary text-white">Pegawai</div>
                </a>
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3">{{ $employees }} pegawai</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Department -->
        <div class="col-lg-3">
            <div class="card border-primary">
                <a href="{{ route('department.index') }}">
                    <div class="card-header bg-primary text-white">Departemen</div>
                </a>
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3">{{ $departments }} departemen</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kantor -->
        <div class="col-lg-3">
            <div class="card border-warning">
                <a href="{{ route('customer.index') }}">
                    <div class="card-header bg-warning text-white">Customer</div>
                </a>
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3">{{ $customers }} customer</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product -->
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

        <!-- Testimonial -->
        <div class="col-lg-3">
            <div class="card border-danger">
                <a href="{{ route('testimonial.index') }}">
                    <div class="card-header bg-warning text-white">Testimoni</div>
                </a>
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3">{{ $testimonials }} testimoni</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
