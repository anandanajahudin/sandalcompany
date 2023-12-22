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
                    <h5 class="card-title fw-semibold mb-4">
                        Order Detail | #OR-{{ $order->id }}
                    </h5>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <h6 class="fw-semibold mb-0">Tanggal Order</h6>
                                {{ date('d M Y', strtotime($order->created_at)) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <h6 class="fw-semibold mb-0">Customer</h6>
                                {{ $order->customer->nama }}

                            </div>
                        </div>
                    </div>

                    <hr>

                    <a href="{{ route('order.create') }}" class="btn btn-success">
                        + Order
                    </a>

                    @if (Auth::user()->user_type != 'customer')
                        @if ($order->status != 3)
                            @if ($order->status == 0)
                                <a class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#modalSendAll">
                                    <span><i class="ti ti-send fs-5"></i>
                                        Kirim Semua</span>
                                </a>
                            @endif

                            @if ($order->status == 2)
                                <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#modalConfirmAll">
                                    <span><i class="ti ti-check fs-5"></i>
                                        Konfirmasi Semua</span>
                                </a>
                            @endif

                            <a class="btn btn-warning mr-2" href="{{ route('order.edit', $order->id) }}">
                                <span><i class="ti ti-pencil fs-5"></i>
                                    Ubah</span>
                            </a>
                        @elseif ($order->status == 3)
                            <button class="btn btn-danger print-page" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                    Print</span>
                            </button>
                        @endif
                    @endif


                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="order_view">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No.</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Harga</h6>
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
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $item->product->nama_produk }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $item->product->harga_jual }}
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($item->status == 2)
                                                <span class="mb-1 badge rounded-pill bg-success">Selesai</span>
                                            @elseif ($item->status == 1)
                                                <span class="mb-1 badge rounded-pill bg-warning">Dikirim</span>
                                            @else
                                                <span class="mb-1 badge rounded-pill bg-danger">Diproses</span>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">

                                                @hasAnyRole(['employee'])
                                                    @if ($item->status == 0)
                                                        <button class='example-popover btn btn-sm btn-warning updateKirim'
                                                            data-id='{{ $item->id }} '><i class='ti ti-send'></i>
                                                            Kirim</button>
                                                    @elseif($item->status == 1)
                                                        <button class='example-popover btn btn-sm btn-success updateDiterima'
                                                            data-id='{{ $item->id }} '><i class='ti ti-check'></i>
                                                            Konfirmasi</button>
                                                    @else
                                                    @endif
                                                @endHasAnyRole
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

    <div class="w-75 w-xs-100 chat-container" style="display:none">
        <div class="invoice-inner-part h-100">
            <div class="invoiceing-box">
                <div class="invoice-header d-flex align-items-center border-bottom p-3">
                    <h4 class="font-medium text-uppercase mb-0">Invoice</h4>
                    <div class="ms-auto">
                        <h4 class="invoice-number">#OR-00{{ $order->id }}</h4>
                    </div>
                </div>
                <div class="p-3" id="custom-invoice">
                    <div class="invoice-{{ $order->id }}" id="printableArea">
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="">
                                    <address>
                                        <h6>&nbsp;From,</h6>
                                        <h6 class="fw-bold">&nbsp;PT Maju Sejahtera</h6>
                                        <p class="ms-1">Surabaya</p>
                                    </address>
                                </div>
                                <div class="text-end">
                                    <address>
                                        <h6>To,</h6>
                                        <h6 class="fw-bold invoice-customer">
                                            {{ $order->customer->nama }},
                                        </h6>
                                        <p class="ms-4">
                                            {{ $order->customer->alamat }}, <br />Kota :
                                            {{ $order->customer->kota }} -
                                            {{ $order->customer->kodepos }}
                                        </p>
                                        <p class="mt-4 mb-1">
                                            <span>Invoice Date :</span>
                                            <i class="ti ti-calendar"></i>
                                            {{ date('d F Y h:i:s', strtotime($order->created_at)) }}
                                        </p>
                                    </address>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive mt-5" style="clear: both">
                                    <table style="width: 100%;" id="order_view" class="table table-hover">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th class="text-start">#</th>
                                                <th class="text-start">Product</th>
                                                <th class="text-start">Quantity</th>
                                                <th class="text-start">Harga</th>
                                                <th class="text-start">Status</th>
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            <!-- start row -->
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        {{ $item->product->nama_produk }}
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        {{ $item->product->harga_jual }}
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        @if ($item->status == 2)
                                                            Selesai
                                                        @elseif ($item->status == 1)
                                                            Dikirim
                                                        @else
                                                            Diproses
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <!-- end row -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="clearfix"></div>
                                <hr />
                                <div class="text-end">


                                    @if ($order->status != 3)
                                        @if ($order->status == 0)
                                            <a class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalSendAll">
                                                <span><i class="fa fa-paper-plane fs-5"></i>
                                                    Kirim Semua</span>
                                            </a>
                                        @endif

                                        @if ($order->status == 2)
                                            <a class="btn btn-success mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalConfirmAll">
                                                <span><i class="fa fa-check fs-5"></i>
                                                    Konfirmasi Semua</span>
                                            </a>
                                        @endif

                                        <a class="btn btn-warning mr-2" href="{{ route('order.edit', $order->id) }}">
                                            <span><i class="ti ti-pencil fs-5"></i>
                                                Ubah</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.back.order.partials.send')
    @include('pages.back.order.partials.sendConfirm')
@endsection

@push('scripts')
    <script src="{{ asset('back/dist/js/apps/jquery.PrintArea.js') }}"></script>
    <script src="{{ asset('back/dist/js/apps/invoice.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#order_view').DataTable({
                ordering: false,
                paging: false
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#order_view').on('click', '.updateKirim', function() {
                let id = $(this).data('id');
                console.log(id);

                Swal.fire({
                    title: 'Konfirmasi Pengiriman',
                    text: "Apakah anda yakin akan mengirimkan pesanan ini?",
                    icon: 'warning',
                    data: id,
                    showCancelButton: true,
                    confirmButtonColor: '#10bd9d',
                    cancelButtonColor: '#ca2062',
                    confirmButtonText: 'Ya, Kirim !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'GET',
                            url: "{{ url('orderItem', ['id']) }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
                            },
                            success: function(data) {
                                window.location.reload();
                                Swal.fire(
                                    'Berhasil!',
                                    'Pesanan dalam proses pengiriman.',
                                    'success'
                                )
                            },
                            error: function(error) {
                                Swal.fire('Error', 'Failed to update status', 'error');
                            }
                        });
                    }
                })
            });

            $('#order_view').on('click', '.updateDiterima', function() {
                let idDiterima = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Penerimaan',
                    text: "Apakah anda yakin telah menerima pesanan ini?",
                    icon: 'warning',
                    data: idDiterima,
                    showCancelButton: true,
                    confirmButtonColor: '#10bd9d',
                    cancelButtonColor: '#ca2062',
                    confirmButtonText: 'Ya, Diterima !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'GET',
                            url: "{{ url('orderItem', ['id']) }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idDiterima,
                            },
                            success: function(data) {
                                window.location.reload();
                                Swal.fire(
                                    'Berhasil!',
                                    'Pesanan telah diterima.',
                                    'success'
                                )
                            },
                            error: function(error) {
                                Swal.fire('Error', 'Failed to update status', 'error');
                                // Handle error
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
