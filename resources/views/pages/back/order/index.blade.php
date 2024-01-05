@extends('layouts.back.main')

@section('title', 'Order')

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
                    <h5 class="card-title fw-semibold mb-4">Order</h5>
                    <a href="{{ route('order.create') }}" class="btn btn-success mb-2">
                        Tambah
                    </a>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="datatable">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No.</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal Order</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kode</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Customer</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kota</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ date('d M Y h:i:s', strtotime($order->created_at)) }}
                                        </td>
                                        <td class="border-bottom-0">
                                            ORD-{{ $order->id }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $order->customer->nama }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $order->customer->kota }}
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($order->status == 0)
                                                <span class="mb-1 badge rounded-pill bg-danger">Proses</span>
                                            @elseif ($order->status == 1)
                                                <span class="mb-1 badge rounded-pill bg-warning">Dikirim Sebagian</span>
                                            @elseif ($order->status == 2)
                                                <span class="mb-1 badge rounded-pill bg-secondary">Dikirim</span>
                                            @else
                                                <span class="mb-1 badge rounded-pill bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="ti ti-arrow-right"></i>
                                                </a>

                                                @php
                                                    $testimoniCheck = \App\Models\Testimonial::where('order_id', $order->id)->exists();
                                                    $orderCheck = \App\Models\Order::where('customer_id', Auth::user()->id)->exists();

                                                    if ($testimoniCheck) {
                                                        $testimonial = \App\Models\Testimonial::where('order_id', $order->id)->first();
                                                    }
                                                @endphp

                                                @if (Auth::user()->user_type == 'customer')
                                                    @if ($orderCheck)
                                                        @include('pages.back.order.partials.testimonial.create')

                                                        @if ($testimoniCheck)
                                                            @include('pages.back.order.partials.testimonial.view')
                                                        @endif
                                                    @endif

                                                    @if ($order->status == 3)
                                                        @if ($testimoniCheck)
                                                            <button data-bs-toggle="modal" data-bs-target="#viewTestimoniModal{{ $order->id }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="ti ti-message"></i>
                                                            </button>
                                                        @else
                                                            <button data-bs-toggle="modal" data-bs-target="#addTestimoniModal{{ $order->id }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="ti ti-message"></i>
                                                            </button>
                                                        @endif
                                                    @endif
                                                @endif

                                                {{-- @hasAnyRole(['employee'])
                                                    <a href="{{ route('order.edit', $order->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>

                                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin menghapus ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
                                                @endHasAnyRole --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
