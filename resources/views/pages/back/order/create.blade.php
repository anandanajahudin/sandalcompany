@extends('layouts.back.main')

@section('title', 'Order Create')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Order Create</h5>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-2">
                                    <label for="customer" class="form-label">Customer</label>

                                    @if (Auth::user()->user_type == 'customer')
                                        <input type="text" class="form-control" value="{{ Auth::user()->nama }}"
                                            readonly>
                                        <input type="hidden" class="form-control" name="customer"
                                            value="{{ Auth::user()->id }}" readonly required>
                                    @else
                                        <select class="form-select" name="customer" id="customer">
                                            <option selected disabled>Pilih customer...</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">
                                                    {{ $customer->nama . ' - ' . $customer->kota }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

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
                                    <input type="text" class="form-control" value="{{ date('d F Y') }}" readonly>
                                </div>
                            </div>
                        </div>

                        <table class="table" id="order" width="100%">
                            <thead>
                                <tr>
                                    <th width="70%"> Choose Product :
                                        <button type="button" class="btn btn-success btn-sm" id="btnAdd">
                                            <h7 class="text-white"><b> + </b>Add</h7>
                                        </button>
                                    </th>
                                    <th width="20%">Quantity</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="product_id[]" id="product_id[]" class="selektize" required>
                                            <option></option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->nama_produk . ' - ' . $product->category->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <input type="number" class="form-control" name="quantity[]" id="quantity[]"
                                            required>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger" disabled>x</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr />
                        <div class="form-group mb-3">
                            <button type="submit" id="submiten" class="btn btn-primary">Submit</button>
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
