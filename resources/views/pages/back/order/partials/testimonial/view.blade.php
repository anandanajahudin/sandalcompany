<!-- Modal -->
<div class="modal fade" id="viewTestimoniModal{{ $order->id }}" tabindex="-1" aria-labelledby="viewTestimoniModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTestimoniModallLabel">View Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group mb-2">
                    <label for="order" class="form-label">Order</label>
                    <input type="text" class="form-control" value="ORD-{{ $order->id }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $order->customer->nama }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="text" class="form-control" value="{{ $testimonial->nilai }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="testimoni" class="form-label">Testimoni</label>
                    <textarea class="form-control" readonly>{{ $testimonial->testimoni }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
