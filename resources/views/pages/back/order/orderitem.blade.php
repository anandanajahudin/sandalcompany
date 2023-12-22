<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orderitem.store', $order->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-select" name="product_id" id="product_id" required>
                            <option selected disabled>Pilih Produk</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                            @endforeach
                        </select>

                        @error('product_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity"  required>

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
