@extends('layouts.back.main')

@section('title', 'Order Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Order Edit</h5>

                    <form action="{{ route('order.updateOrder', $order->id) }}" id="formEdit" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <label for="customer" class="form-label">Customer</label>
                                    <input type="text" class="form-control" name="customer"
                                        value="{{ $order->customer->nama }}" readonly>

                                    @error('customer')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <label for="customer" class="form-label">Date Order</label>
                                    <input type="text" class="form-control"
                                        value="{{ date('d F Y', strtotime($order->created_at)) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <table class="table" id="order" width="100%">
                            <thead>
                                <tr>
                                    <th width="70%">Product :
                                        <button type="button" class="btn btn-success btn-sm" id="btnAdd">
                                            <h7 class="text-white"><b> + </b>Add</h7>
                                        </button>
                                    </th>
                                    <th width="20%">Quantity</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td>
                                            @if ($item->status == 0)
                                                <select name="product_id[]" id="product_id[]" class="selektize" required>
                                                    <option value="{{ $item->product_id }}" selected>
                                                        {{ $item->product->article->nama_artikel . ' - ' . $item->product->category->kode_size_fg }}
                                                    </option>

                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->article->nama_artikel . ' - ' . $product->category->kode_size_fg }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="text" name="product_id2[]" id="product_id2[]"
                                                    class="form-control"
                                                    value="{{ $item->product->article->nama_artikel . ' - ' . $item->product->category->kode_size_fg }}"
                                                    readonly>

                                                <input type="hidden" name="product_id[]" id="product_id[]"
                                                    value="{{ $item->id }}" readonly>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($item->status == 0)
                                                <input type="number" class="form-control" name="quantity[]" id="quantity[]"
                                                    value="{{ $item->quantity }}" required>
                                            @else
                                                <input type="number" class="form-control" name="quantity[]" id="quantity[]"
                                                    value="{{ $item->quantity }}" readonly>
                                            @endif

                                            <input type="hidden" class="form-control" name="item[]" id="item[]"
                                                value="{{ $item->id }}" readonly>
                                        </td>

                                        <td>
                                            @if ($item->status == 0)
                                                <button type="button" class="btn btn-danger hapusItem"
                                                    data-id="{{ $item->id }}">x</button>
                                            @else
                                                <button type="button" class="btn btn-danger" disabled>x</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" id="submiten">Simpan</button>
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        let lineNo = 2;

        $(document).ready(function() {
            $('.selektize').selectize();

            function addRow() {
                const tbody = $("#order tbody");
                const newRow = $("<tr>");
                newRow.html(
                    "<td>" +
                    "<select name='product_id[]'" +
                    "id='product_id[]' class='selectize' required>" +
                    "<option></option>" +
                    "@foreach ($products as $product)" +
                    "<option value='{{ $product->id }}'>" +
                    "{{ $product->nama_produk . ' - ' . $product->category->nama_kategori }}</option>" +
                    "@endforeach" +
                    "</select>" +
                    "<td><input type='number' class='form-control' name='quantity[]'" +
                    "id='quantity[]' required></td>" +
                    "<td><button type='button' class='btn btn-danger' id='btnRemove'>x</button></td>"
                );
                tbody.append(newRow);

                // Initialize Selectize for the new row's dropdown
                newRow.find(".selectize").selectize();
            }

            // Add a new row when the button is clicked
            $("#btnAdd").click(addRow);

            $("#order").on('click', '#btnRemove', function() {
                $(this).closest('tr').remove();
            });

        });
    </script>
@endpush
