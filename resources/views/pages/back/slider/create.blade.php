<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">New Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control border-primary @error('image') is-invalid @enderror"
                            name="image" id="image" placeholder="Gambar Produk" required>
                        <small>Only .jpg, .png, .jpeg, .svg, .webp File</small>

                        @error('image')
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
