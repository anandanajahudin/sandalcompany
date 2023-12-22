<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">New Product Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="kode_kategori" class="form-label">Category Code</label>
                        <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror"
                            name="kode_kategori" value="{{ old('kode_kategori') }}" required>

                        @error('kode_kategori')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nama_kategori" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            name="nama_kategori" required>

                        @error('nama_kategori')
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
