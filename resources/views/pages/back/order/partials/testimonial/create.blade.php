<!-- Modal -->
<div class="modal fade" id="addTestimoniModal{{ $order->id }}" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">New Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="order" class="form-label">Order</label>
                        <input type="text" class="form-control" value="ORD-{{ $order->id }}" required readonly>
                        <input type="hidden" name="order" value="{{ $order->id }}" required readonly>

                        @error('order')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ $order->customer->nama }}" required readonly>

                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nilai" class="form-label">Nilai</label>
                        <select class="form-select" name="nilai" id="nilai" required>
                            <option selected disabled>Pilih nilai...</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>

                        @error('nilai')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <input type="text" class="form-control @error('testimoni') is-invalid @enderror"
                            name="testimoni" required>

                        @error('testimoni')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
